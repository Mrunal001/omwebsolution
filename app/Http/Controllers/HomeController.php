<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Register;
use App\Models\Contact;
use App\Models\FAQ;
use App\Models\Portfolio;
use App\Models\Career;
use App\Models\Visitor;
use App\Models\ProjectImage;
use DB;
use Mail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projectCount = Project::count();
        $faqCount = FAQ::count();
        $userCount = Register::count();
        $careerCount = Career::count();
        $contactCount = Contact::count();
        $visitorCount = Visitor::where('id',1)->first();
        return view('admin.index',compact('projectCount','faqCount','userCount','careerCount','contactCount','visitorCount'));
    }
    public function addproject()
    {
        return view('admin.addproject');
    }
    public function createproject(Request $request)
    {
        $request->validate([
            'project_name'=> 'required|string|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'project_desc'=>'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_price'=>'required|integer',
            'technology'=>'required',
            'can_be_used'=>'required',
            'modules'=>'required'
        ]);

        /*$imgData = [];
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('/uploads'), $name);  
                $imgData[] = $name;  
            }
         }*/

        $pid = DB::table('project')->insertGetId([
            "name"=>$request->project_name,
            "description"=>$request->project_desc,
            "technology"=>$request->technology,
            "can_be_used"=>$request->can_be_used,
            "modules"=>$request->modules,
            "price"=>$request->project_price,
            "status"=>$request->project_status
        ]);

        $avatar = $request->file('images');
        $path = '/uploads';
        $destinationPath=public_path($path);
        $data['countgallery']=count($avatar);
        
        for($z=0;$z<count($avatar);$z++)
        {
            $fname=$request->file('images')[$z]->getClientOriginalName();
            $data['pimages'.$z]=$request->file('images')[$z]->move($destinationPath,$fname);
            $data['images'.$z]=$fname;

            DB::table('project_images')->insert(["pid"=>$pid,"pimage"=>$fname]);
        }


       return back()->with('success', 'Project Detail Added successfully');
    }
    public function deleteimaenoe($id)
    {
        return DB::table('project_images')->where('id','=',$id)->delete();
    }
    public function projectlist()
    {
        $getData = Project::orderBy('id', 'desc')->get();
        return view('admin.listproject',compact('getData'));
    }
    public function editproject($id)
    {
        $getData=Project::where('id',$id)->first();
        $imageData=ProjectImage::where('pid',$id)->get();
        return view('admin.editproject',compact('getData','imageData'));
    }
    public function updateproject(Request $request)
    {
        $request->validate([
            'project_name'=> 'required|string|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'project_desc'=>'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_price'=>'required|integer',
            'technology'=>'required',
            'can_be_used'=>'required',
            'modules'=>'required'
        ]);


        $data['my_filesN'] = $request->file('images');
        $avatar = $request->file('images');
    
        if($avatar)
        {
            $path = '/uploads';
            $destinationPath=public_path($path);
            
            $data['countgallery']=count($avatar);
            
            for($z=0;$z<count($avatar);$z++)
            {
                $fname=$request->file('images')[$z]->getClientOriginalName();
                $data['imagess'.$z]=$request->file('images')[$z]->move($destinationPath,$fname);
                $data['images'.$z]=$fname;

                DB::table('project_images')->insert(["pid"=>$request->pid,"pimage"=>$fname]);
            }
                
        }


        $project = Project::find($request->pid);
        $project->update([
            'name' => $request->project_name,
            'description' => $request->project_desc,
            'price'=>$request->project_price,
            'status'=>$request->project_status,
            'technology'=>$request->technology,
            'can_be_used'=>$request->can_be_used,
            'modules'=>$request->modules
        ]);
       
        return redirect()->route('projectlist')->with('success','Project updated successfully');
    }
    public function deleteproject($id)
    {
        $project=Project::find($id);
        $project->delete();

        return redirect()->route('projectlist')->with('success','Project delete successfully');
    }
    public function userlist()
    {
        $getData = Register::orderBy('id', 'desc')->get();
        return view('admin.listusers',compact('getData'));
    }
    public function deleteusers($id)
    {
        $project=Register::find($id);
        $project->delete();

        return redirect()->route('userlist')->with('success','User delete successfully');
    }
    public function editusers($id)
    {
        $getData=Register::where('id',$id)->first();
        return view('admin.editusers',compact('getData'));
    }
    public function updateusers(Request $request)
    {
        $request->validate([
            'fullname'=> 'required',
            'phone'=>'required',
            'gender'=>'required'
        ]);

        $userData = Register::find($request->pid);
        $userData->update([
            'fullname' => $request->fullname,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'status'=>$request->status
        ]);
       
        return redirect()->route('userlist')->with('success','User detail updated successfully');
    }
    public function contactlist()
    {
        $getData = Contact::orderBy('id', 'desc')->get();
        return view('admin.listcontact',compact('getData'));
    }
    public function faqlist()
    {
        $getData=FAQ::get();
        return view('admin.pendingfaq',compact('getData'));
    }  
    public function editfaq($id)
    {
        $getData=FAQ::where('id',$id)->first();
        return view('admin.editfaq',compact('getData'));
    }  
    public function updatefaq(Request $request)
    {
        $request->validate([
            'question'=> 'required',
            'answer'=>'required'
        ]);

        $userData = FAQ::find($request->fid);
        $userData->update([
            'question' => $request->question,
            'answer'=>$request->answer,
            'status'=>$request->status
        ]);
       
       return back()->with('success', 'Question / Answer updated successfully');
    }

    public function addportfolio()
    {
        return view('admin.addportfolio');
    }
    public function portfoliolist()
    {
        $getData = Portfolio::orderBy('id', 'desc')->get();
        return view('admin.listportfolio',compact('getData'));
    }
    public function createportfolio(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'type'=>'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('images')) {
            foreach($request->file('images') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/portfolio/', $name);  
                $imgData= $name;  
            }
        }

        $addData = new Portfolio();
        $addData->title=$request->title;
        $addData->images=$imgData;
        $addData->type=$request->type;
        $addData->status=$request->status;
       
        $addData->save();

       return back()->with('success', 'Portfolio Added successfully');
    }
    public function editportfolio($id)
    {
        $getData=Portfolio::where('id',$id)->first();
        return view('admin.editportfolio',compact('getData'));
    }
    public function updateportfolio(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'type'=>'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $getImage = Portfolio::where('id',$request->id)->first();

        if($request->hasfile('images')) {
            foreach($request->file('images') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/portfolio/', $name);  
                $imgData = $name;  
            }
        }
        else{
            $imgData=$getImage->images;
        }

        $project = Portfolio::find($request->id);
        
        $project->update([
            'title' => $request->title,
            'images'=>$imgData,
            'type'=>$request->type,
            'status'=>$request->status
        ]);
        
        return redirect()->route('portfoliolist')->with('success','Portfolio updated successfully');
    }
    public function deleteportfolio($id)
    {
        $project=Portfolio::find($id);
        $project->delete();

        return redirect()->route('portfoliolist')->with('success','Portfolio delete successfully');
    }
    public function careerlist()
    {
        $getData = Career::orderBy('id', 'desc')->get();
        return view('admin.listcareer',compact('getData'));
    }
    public function getContactData(Request $request)
    {
        $getData= Contact::where('id',$request->customer_id)->first();

        return $getData->email;
    }
    public function contactAnswer(Request $request)
    {
        $contactData = Contact::find($request->cid);
        $contactData->update([
            'answer' => $request->answer,
        ]);

        $data_mail = array('subject'=>"Conatct Query Reply",'email'=>$request->email,'html'=>$request->answer);

        Mail::send(array(), $data_mail, function($message) use ($data_mail) {
            $message->to($data_mail['email'])->subject($data_mail['subject']);
            $message->setBody($data_mail['html'], 'text/html');
            $message->from('omwebsolution@gmail.com','Om Web Solution');
        });
       
        return redirect()->route('contactlist')->with('success','Contact Answer updated successfully');
    }
    
}