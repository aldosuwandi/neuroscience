<?php namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Schedule;

class ScheduleController extends Controller {

    public function getIndex()
    {
        $schedules = Schedule::all();
        return view('schedule')->with('schedules',$schedules);
    }
}
