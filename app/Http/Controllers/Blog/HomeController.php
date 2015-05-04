<?php namespace App\Http\Controllers\Blog;

use App\Clinic;
use App\Home;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class HomeController extends Controller {

    public function getIndex()
    {
        $homes = Home::all();
        $clinics = Clinic::all();
        return view('welcome')
            ->with('homes',$homes)
            ->with('clinics',$clinics);
    }
}
