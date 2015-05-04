<?php namespace App\Http\Controllers\Blog;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class DoctorController extends Controller {

    public function getIndex()
    {
        $doctors = Doctor::all();
        return view('doctor')->with('doctors',$doctors);
    }

}
