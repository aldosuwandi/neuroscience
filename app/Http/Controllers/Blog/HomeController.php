<?php namespace App\Http\Controllers\Blog;

use App\Clinic;
use App\Home;
use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class HomeController extends Controller {

    public function getIndex()
    {
        $homes = Home::all();
        $clinics = Clinic::all();
        $event = Event::where('active','=',1)->first();
        return view('welcome')
            ->with('event',$event)
            ->with('homes',$homes)
            ->with('clinics',$clinics);
    }
}
