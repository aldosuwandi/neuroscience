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

Route::get('/',[
    'as' => 'home',
    'uses' => 'Blog\HomeController@getIndex'
]);


Route::controllers([

    //ADMIN
    'auth' => 'Auth\AuthController',
    'admin/clinic' => 'Admin\ClinicController',
    'admin/category' => 'Admin\CategoryController',
    'admin/doctor' => 'Admin\DoctorController',
    'admin/home' => 'Admin\HomeController',
    'admin/post' => 'Admin\PostController',
    'admin/question' => 'Admin\QuestionController',
    'admin/event' => 'Admin\EventController',
    'admin/schedule' => 'Admin\ScheduleController',
    'admin/image' => 'Admin\ImageController',

    //BLOG
    'clinic' => 'Blog\ClinicController',
    'home' => 'Blog\HomeController',
    'post' => 'Blog\PostController',
    'question' => 'Blog\QuestionController',
    'schedule' => 'Blog\ScheduleController',
    'doctors' => 'Blog\DoctorController',
    'events'=> 'Blog\EventController',
    'sitemap' => 'SitemapController'
]);

