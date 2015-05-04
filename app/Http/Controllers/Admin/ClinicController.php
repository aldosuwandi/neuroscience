<?php namespace App\Http\Controllers\Admin;
use App\Clinic;
use App\Http\Requests\CreateClinicRequest;
use Illuminate\Http\Request;

class ClinicController extends AdminController {

    public function getIndex()
    {
        return $this->getList();
    }

    public function getList()
    {
        $clinics = Clinic::paginate(10);
        return view('admin.clinic.list')->with('clinics',$clinics);
    }

    public function getCreate()
    {
        $clinic = new Clinic();
        return view('admin.clinic.form')->with('clinic',$clinic);
    }

    public function postCreate(CreateClinicRequest $request)
    {
        Clinic::create($request->all());
        return $this->getList();
    }

    public function getDelete($id)
    {
        Clinic::find($id)->delete();
        return $this->getList();
    }

    public function postEdit(CreateClinicRequest $request)
    {
        $id = $request->input('id');
        $clinic = Clinic::find($id);
        $clinic->name = $request->input('name');
        $clinic->description = $request->input('description');
        $clinic->save();
        return $this->getList();
    }



}
