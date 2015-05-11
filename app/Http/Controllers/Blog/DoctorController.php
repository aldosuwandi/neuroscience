<?php namespace App\Http\Controllers\Blog;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class DoctorController extends Controller {

    public function getIndex()
    {
        $doctors = Doctor::all();
        return view('blog.doctor.list')->with('doctors',$doctors);
    }

    public function getView($id)
    {
        $doctor = Doctor::find($id);
        return view('blog.doctor.detail')->with('doctor',$doctor);
    }

}
