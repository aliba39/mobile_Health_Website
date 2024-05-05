<?php

namespace App\Http\Controllers;
use App\Mail\ContactUsMail;
use App\Mail\ResetPasswordMail;
use App\Mail\WelcomeMail;
//use http\Env\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


//Mail server route/controller (david wants to change the location of this)
Route::get('/contactusmail', function (Request $request) {
    Mail::to('contact@contact.com', ['request' => $request ])->send(new ContactUsMail());
    return new ContactUsMail();
});

Route::get('/resetpasswordmail', function (Request $request) {
    Mail::to($request->email, ['request' => $request ])->send(new ResetPasswordMail());
    return new ResetPasswordMail();
});


Route::resource('courses', CourseController::class)->only(['show','create',]);
Route::resource('courses', CourseController::class)->only(['index','create','store','edit','update','destroy'])->middleware('auth');
Route::resource('coursedates', CoursedateController::class)->only(['index','create','store','edit','update','show','destroy'])->middleware('auth');
Route::resource('bookings', BookingController::class)->only(['create','store',]);
Route::resource('bookings', BookingController::class)->only(['index','edit','update','show','destroy'])->middleware('auth');
Route::resource('users', UserController::class)->only(['index','create','store','edit','update','show','destroy'])->middleware('auth');

Route::get('/dashboard', 'App\Http\Controllers\HomeController@index');
Route::get('/', [HomeController::class, 'index']);

Route::get('/facourses', [HomeController::class, 'display']);
Route::get('/aboutus', function () {return view('home.aboutus');});
Route::get('/contactus', function () {return view('home.contactus');});
Route::get('/terms', function () {return view('home.terms');});
Route::get('/home/confirm', function () {return view('home.confirm');});


require __DIR__.'/auth.php';
