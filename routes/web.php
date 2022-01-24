<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return view('auth.login');
});

Auth::routes();

/*****   Admin     ******/

Route::get('/dashboard', [App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('/addproject', [App\Http\Controllers\HomeController::class,'addproject'])->name('addproject');
Route::post('/createproject', [App\Http\Controllers\HomeController::class,'createproject'])->name('createproject');
Route::get('/projectlist', [App\Http\Controllers\HomeController::class,'projectlist'])->name('projectlist');
Route::get('/editproject/{id}', [App\Http\Controllers\HomeController::class,'editproject'])->name('editproject');
Route::post('/updateproject', [App\Http\Controllers\HomeController::class,'updateproject'])->name('updateproject');
Route::get('/deleteproject/{id}', [App\Http\Controllers\HomeController::class,'deleteproject'])->name('deleteproject');

Route::get('/userlist', [App\Http\Controllers\HomeController::class,'userlist'])->name('userlist');
Route::get('/editusers/{id}', [App\Http\Controllers\HomeController::class,'editusers'])->name('editusers');
Route::get('/deleteusers/{id}', [App\Http\Controllers\HomeController::class,'deleteusers'])->name('deleteusers');
Route::post('/updateusers', [App\Http\Controllers\HomeController::class,'updateusers'])->name('updateusers');

Route::get('/contactlist', [App\Http\Controllers\HomeController::class,'contactlist'])->name('contactlist');

Route::get('/faqlist', [App\Http\Controllers\HomeController::class,'faqlist'])->name('faqlist');
Route::get('/editfaq/{id}', [App\Http\Controllers\HomeController::class,'editfaq'])->name('editfaq');
Route::post('/updatefaq', [App\Http\Controllers\HomeController::class,'updatefaq'])->name('updatefaq');

Route::get('/addportfolio', [App\Http\Controllers\HomeController::class,'addportfolio'])->name('addportfolio');
Route::get('/portfoliolist', [App\Http\Controllers\HomeController::class,'portfoliolist'])->name('portfoliolist');
Route::post('/createportfolio', [App\Http\Controllers\HomeController::class,'createportfolio'])->name('createportfolio');
Route::get('/editportfolio/{id}', [App\Http\Controllers\HomeController::class,'editportfolio'])->name('editportfolio');
Route::post('/updateportfolio', [App\Http\Controllers\HomeController::class,'updateportfolio'])->name('updateportfolio');
Route::get('/deleteportfolio/{id}', [App\Http\Controllers\HomeController::class,'deleteportfolio'])->name('deleteportfolio');

Route::get('/careerlist', [App\Http\Controllers\HomeController::class,'careerlist'])->name('careerlist');

Route::get('/deleteimaenoe', [App\Http\Controllers\HomeController::class,'deleteimaenoe'])->name('deleteimaenoe');

Route::post('/getContactData', [App\Http\Controllers\HomeController::class,'getContactData'])->name('getContactData');

Route::post('/contactAnswer', [App\Http\Controllers\HomeController::class,'contactAnswer'])->name('contactAnswer');

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

/******   Front   *******/
Route::get('/', [App\Http\Controllers\FrontController::class,'index'])->name('index');
Route::get('about', [App\Http\Controllers\FrontController::class,'about'])->name('about');
Route::get('service', [App\Http\Controllers\FrontController::class,'service'])->name('service');
Route::get('portfolios', [App\Http\Controllers\FrontController::class,'portfolio'])->name('portfolio');
Route::get('careers', [App\Http\Controllers\FrontController::class,'career'])->name('career');
Route::get('contact', [App\Http\Controllers\FrontController::class,'contact'])->name('contact');
Route::post('addcontact', [App\Http\Controllers\FrontController::class,'addcontact'])->name('addcontact');
Route::get('signin', [App\Http\Controllers\FrontController::class,'signin'])->name('signin');
Route::post('register', [App\Http\Controllers\FrontController::class,'register'])->name('register');
Route::post('userlogin', [App\Http\Controllers\FrontController::class,'userlogin'])->name('userlogin');
Route::get('userlogout', [App\Http\Controllers\FrontController::class,'userlogout'])->name('userlogout');
Route::get('/project', [App\Http\Controllers\FrontController::class,'project'])->name('project');
Route::get('/projectDetail/{id}', [App\Http\Controllers\FrontController::class,'projectDetail'])->name('projectDetail');
Route::post('/addfaq', [App\Http\Controllers\FrontController::class,'addfaq'])->name('addfaq');
Route::post('/addcareer', [App\Http\Controllers\FrontController::class,'addcareer'])->name('addcareer');

Route::get('/cart', [App\Http\Controllers\FrontController::class,'cart'])->name('cart');
Route::post('/add_to_cart', [App\Http\Controllers\FrontController::class,'add_to_cart'])->name('add_to_cart');

Route::get('refresh_captcha',[App\Http\Controllers\FrontController::class,'refreshCaptcha'])->name('refresh_captcha');

Route::get('payment/{name}/{price}/{id}', [App\Http\Controllers\FrontController::class,'payment'])->name('payment');

//Route::post('updateprofile', [App\Http\Controllers\FrontController::class, 'store'])->name('razorpay.payment.store');

Route::get('manageprofile', [App\Http\Controllers\FrontController::class,'manageprofile'])->name('manageprofile');

Route::post('updateprofile', [App\Http\Controllers\FrontController::class, 'updateprofile'])->name('updateprofile');

Route::get('changepassword', [App\Http\Controllers\FrontController::class,'changepassword'])->name('changepassword');

Route::post('updatepassword', [App\Http\Controllers\FrontController::class,'updatepassword'])->name('updatepassword');

Route::get('forgetpassword', [App\Http\Controllers\FrontController::class,'forgetpassword'])->name('forgetpassword');

Route::post('emailverify', [App\Http\Controllers\FrontController::class,'emailverify'])->name('emailverify');

Route::post('razorpay-payment', [App\Http\Controllers\FrontController::class, 'store'])->name('razorpay.payment.store');

Route::get('commingsoon', [App\Http\Controllers\FrontController::class,'commingsoon'])->name('commingsoon');

Route::get('add-to-cart/{id}', [App\Http\Controllers\FrontController::class, 'addToCart'])->name('add.to.cart');
Route::get('cart', [App\Http\Controllers\FrontController::class, 'cart'])->name('cart');
Route::patch('update-cart', [App\Http\Controllers\FrontController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [App\Http\Controllers\FrontController::class, 'remove'])->name('remove.from.cart');