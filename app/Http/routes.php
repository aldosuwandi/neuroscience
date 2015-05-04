<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',function(){
    return view('welcome');
});

Route::get('/home',function(){
    return view('blog.home');
});

Route::get('/post',function(){
    return view('blog.post');
});

Route::get('/question',function(){
    return view('blog.qa.question');
});

Route::get('/answer',function(){
    return view('blog.qa.answer');
});

Route::get('/doctor',function(){
    return view('doctor');
});

Route::get('/schedule',function(){
    return view('schedule');
});

Route::get('/createquestion',function() {
    return view('blog.qa.form');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
    'admin/clinic' => 'Admin\ClinicController',
    'admin/category' => 'Admin\CategoryController',
    'admin/doctor' => 'Admin\DoctorController',
    'admin/home' => 'Admin\HomeController',
    'admin/post' => 'Admin\PostController',
    'admin/question' => 'Admin\QuestionController',
    'admin/event' => 'Admin\EventController',
    'admin/schedule' => 'Admin\ScheduleController'
]);
