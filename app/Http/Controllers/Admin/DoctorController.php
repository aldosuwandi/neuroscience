<?php namespace App\Http\Controllers\Admin;
use App\Doctor;
use App\Http\Requests;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

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

    public function getCreate($id = null)
    {
        if (is_null($id)) {
            $doctor = new Doctor();;
        } else {
            $doctor = Doctor::find($id);
        }
        return view('admin.doctor.form')->with('doctor',$doctor);
    }

    public function postCreate(Requests\CreateDoctorRequest $request)
    {
        $destinationPath = 'uploads';
        $fileName = sha1(microtime()).".".$request->file('image')->getClientOriginalExtension();
        $input = $request->all();
        $input['img_url'] = $fileName;
        Doctor::create($input);
        $request->file('image')->move($destinationPath, $fileName);
        return redirect('admin/doctor');
    }

    public function getDelete($id)
    {
        Doctor::find($id)->delete();
        return redirect('/admin/doctor/list');
    }

    public function postEdit(Request $request)
    {
        $doctor = Doctor::find($request->input('id'));
        if ($request->hasFile('image')) {
            $destinationPath = 'uploads';
            $fileName = sha1(microtime()).".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($destinationPath, $fileName);
            $doctor->img_url = $fileName;
        }
        $doctor->name = $request->input('name');
        $doctor->birthday = $request->input('birthday');
        $doctor->institution = $request->input('institution');
        $doctor->address = $request->input('address');
        $doctor->phone = $request->input('phone');
        $doctor->email = $request->input('email');
        $doctor->education = $request->input('education');
        $doctor->experience = $request->input('experience');
        $doctor->organization = $request->input('organization');
        $doctor->training = $request->input('training');
        $doctor->publication = $request->input('publication');
        $doctor->title = $request->input('title');
        $doctor->save();
        return redirect('/admin/doctor/list');
    }


}
