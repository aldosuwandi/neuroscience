<?php namespace App\Http\Controllers\Admin;
use App\Doctor;
use App\Http\Requests;
use Illuminate\Http\Request;

class DoctorController extends AdminController {

    public function getIndex()
    {
        return $this->getList();
    }

    public function getList()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.list')->with('doctors',$doctors);
    }

    public function getCreate()
    {
        $doctor = new Doctor();
        return view('admin.doctor.form')->with('doctor',$doctor);
    }

    public function postCreate(Requests\CreateDoctorRequest $request)
    {
        $destinationPath = 'doctor';
        $fileName = $request->file('image')->getClientOriginalName();
        Doctor::create([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'img_url' => $fileName
        ]);
        $request->file('image')->move($destinationPath, $fileName);
        return redirect('admin/doctor');
    }

    public function getDelete($id)
    {
        Doctor::find($id)->delete();
        return $this->getList();
    }

    public function postEdit(CreateDoctorRequest $request)
    {

    }


}
