<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Register;
use App\Models\FAQ;
use App\Models\Visitor;
use Hash;
use Session;
use App\Models\Portfolio;
use App\Models\Career;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProjectImage;
use Mail;
use Razorpay\Api\Api;
use Redirect;
use DB;

class FrontController extends Controller
{
    public function index()
    {
        $vid=1;
        $getCount=Visitor::where('id',1)->first();
        if($getCount)
        {
            $totalCount = $getCount->count;

            //echo $totalCount; echo $totalCount+1; exit;
            $visitorData = Visitor::find($vid);
            $visitorData->update([
                'count' => $totalCount+1
            ]);
        }

        $getData = Portfolio::orderBy('id', 'desc')->where('status',1)->take(5)->get();
        return view('index',compact('getData'));
    }
    public function about()
    {
        return view('about');
    }
    public function service()
    {
        return view('service');
    }
    public function portfolio()
    {
        $getData = Portfolio::orderBy('id', 'desc')->where('status',1)->get();
        return view('portfolio',compact('getData'));
    }
    public function career()
    {
        return view('career');
    }
    public function contact()
    {
        return view('contact');
    }
    public function signin()
    {
        return view('signin');
    }
    public function register(Request $request)
    {
        $request->validate([
            'fullname'=> 'required',
            'email'=>'required|unique:register',
            'password'=>'required',
            'phone'=>'required',
            'gender'=>'required'
        ]);

        $addData = new Register();
        $addData->fullname=$request->fullname;
        $addData->email=$request->email;
        $addData->password=Hash::make($request->password);
        $addData->phone=$request->phone;
        $addData->gender=$request->gender;
        
        $addData->save();

       return redirect()->back()->with('message', 'Register Successfully');
    }
    
    public function addcontact(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=>'required',
            'message'=>'required'
        ]);

        $addData = new Contact();
        $addData->name=$request->name;
        $addData->email=$request->email;
        $addData->country=$request->country;
        $addData->state=$request->state;
        $addData->city=$request->city;
        $addData->subject =$request->subject;
        $addData->message=$request->message;
       
        $addData->save();

       return redirect()->back()->with('success', 'Contact Detail Save Successfully');        
    }
    
    public function project()
    {
        $getData=Project::where('status',1)->orderBy('id','DESC')->get();
        return view('project',compact('getData'));
    }
    public function projectDetail($id)
    {
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = [];

        $pid=$id;
        $getData=Project::where('status',1)->where('id',$id)->first();
        $latestData = Project::where('id','!=',$getData->id)->latest()->take(4)->get();
        $faqData=FAQ::where('status',1)->where('pid',$pid)->where('answer','!=',null)->get();
        $imageData=ProjectImage::where('pid',$id)->get();
        return view('project_detail',compact('getData','latestData','pid','faqData','imageData','cart'));
    }  
    public function userlogin(Request $request)
    {
        $getData=Register::where('email',$request->email)->first();
        if(empty($request->password))
        {    
            return redirect()->route('signin')->with('error','Password is Empty');
        }
        if($getData)
        {
            if (Hash::check($request->password, $getData->password)) 
            {
                Session::put('userdata', $getData);
                return redirect()->route('index')->with('message','Login successfully');
            }
            else{
                return redirect()->route('signin')->with('error','Something Wrong.!!');
            }
        }
        else{
                return redirect()->route('signin')->with('error','Something Wrong.!!');
            }
    }  
    public function userlogout()
    {
        Session::forget('userdata');
        return redirect()->route('index');
    }
    public function addfaq(Request $request)
    {
        $request->validate([
            'question'=>'required'
        ]);

        $addData = new FAQ();
        $addData->pid=$request->pid;
        $addData->uid=$request->uid;
        $addData->question=$request->question;
       
        $addData->save();

        return redirect()->back()->with('success', 'Your Query Will be Submited');
    }
    public function addcareer(Request $request)
    {
        $request->validate([
            'fullname'=>'required',
            'email'=>'required',
            'education'=>'required',
            'experience'=>'required',
            'c_salary'=>'required',
            'e_salary'=>'required',
            'reason'=>'required',
            'upload' => 'required|mimes:pdf|max:2048',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'captcha' => 'required|captcha'
        ]);

        if($request->upload->extension() != 'pdf')
        {
            return redirect()->back()->with('error', 'Submite Only PDF');
        } 
        else
        {
            $fileName = time().'.'.$request->upload->extension(); 
       
            $request->upload->move(public_path('career'), $fileName);

            $addData = new Career();
            $addData->name=$request->fullname;
            $addData->email=$request->email;
            $addData->education=$request->education;
            $addData->experience=$request->experience;
            $addData->c_salary=$request->c_salary;
            $addData->e_salary=$request->e_salary;
            $addData->reason=$request->reason;
            $addData->upload = $fileName;
            $addData->country=$request->country;
            $addData->state=$request->state;
            $addData->city=$request->city;
            $addData->extra=$request->extra;
           
            $addData->save();

            $subject = "Career Mail";
            $Email= $request->email;
            $html= "Thank you.";

            $data_mail = array('subject'=>$subject,'email'=>$Email,'html'=>$html);

            Mail::send(array(), $data_mail, function($message) use ($data_mail) {
                $message->to($data_mail['email'])->subject($data_mail['subject']);
                $message->setBody($data_mail['html'], 'text/html');
                $message->from('omwebsolution@gmail.com','Om Web Solution');
            });

            return redirect()->back()->with('message', 'Form Will be Submited');
        }
    }
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    
    public function payment($name,$price,$id)
    {
        $data['name']= $name;
        $data['price']= $price;
        $data['id']= $id; 

        $data['Project'] = Project::where('id',$id)->first();
        return view('cart',compact('data'));
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        //echo "<pre>"; print_r($input); exit;
        $userdata = Session::get('userdata');

        $cart =session()->get('cart');

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) 
        {
            try 
            {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

                $oid = DB::table('orders')->insertGetId([
                    "user_id"=>$userdata->id,
                    "amount"=>$input['totalamt'],
                    "paid_response"=>$input['razorpay_payment_id']
                ]);

                foreach ($cart as $key => $data) 
                {
                    $oid = DB::table('order_items')->insert([
                        "order_id"=>$oid,
                        "product_id"=>$data['pid'],
                        "amount"=>$data['price']
                    ]);
                }

                Session::forget('cart');

                 return redirect()->route('project')->with('message','Your project will be delivered within 2 hrs in your registered email id after payment successfully');

            }
            catch (Exception $e) 
            {
                return  $e->getMessage();

                Session::put('error',$e->getMessage());

                return redirect()->back();
            }
        }

        Session::put('success', 'Payment successful');

        return redirect()->back();

    }
    public function manageprofile()
    {
        $userdata = Session::get('userdata');
        $getData = Register::where('id',$userdata->id)->first();
        return view('manageprofile',compact('getData'));
    }
    public function updateprofile(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'phone'=>'required',
            'gender'=>'required'
        ]);

        $userData = Register::find($request->id);
        $userData->update([
            'fullname' => $request->name,
            'phone'=>$request->phone,
            'gender'=>$request->gender
        ]);
       
        return redirect()->route('manageprofile')->with('success','Profile updated successfully');
    }
    public function forgetpassword()
    {
        return view('verifyemail');
    }
    public function changepassword()
    {
        return view('changepassword');
    }
    public function updatepassword(Request $request)
    {
        $request->validate([
            'oldpass'=> 'required',
            'newpass'=>'required'
        ]);

        $userdata = Session::get('userdata');

        $userData = Register::find($userdata->id);

        $password = Hash::make($request->newpass);

        $userData->update([
            'password' => $password
        ]);
       
        return redirect()->route('changepassword')->with('success','Password change successfully');
    }

    public function emailverify(Request $request)
    {
        $getData=Register::where('email',$request->email)->count();
        if($getData < 1)
        {
            return Redirect::back()->withErrors(['error' => 'Email does not exist..!!']);
        }
        else
        {
            return view('resetpassword');
        }
    }
    public function commingsoon()
    {
        return view('commingsoon');
    }

    public function addToCart($id)
    {
        $product = Project::findOrFail($id);
        $productImage = ProjectImage::where('pid',$id)->first();

        //echo $productImage; exit;
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $productImage->pimage,
                "pid"=>$product->id
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart()
    {
        return view('cart');
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
