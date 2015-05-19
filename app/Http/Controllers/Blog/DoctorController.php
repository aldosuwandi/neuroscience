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

    public function getView($id,$doctorSlug = null)
    {
        $doctor = Doctor::find($id);
        if (is_null($doctorSlug) || $doctorSlug != str_slug($doctor->name)) {
            return redirect('/doctors/view/'.$id.'/'.str_slug($doctor->name));
        }
        return view('blog.doctor.detail')->with('doctor',$doctor);
    }

}
