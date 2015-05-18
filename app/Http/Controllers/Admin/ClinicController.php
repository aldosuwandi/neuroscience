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

    public function getCreate($id = null)
    {
        if(!is_null($id)) {
            $clinic = Clinic::find($id);
        } else {
            $clinic = new Clinic();
        }
        return view('admin.clinic.form')->with('clinic',$clinic);
    }

    public function postCreate(CreateClinicRequest $request)
    {
        $destinationPath = 'uploads';
        $fileName = 'default-clinic.jpg';
        if ($request->hasFile('image')) {
            $fileName = sha1(microtime()).".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($destinationPath, $fileName);
        }
        Clinic::create([
            'name' => $request->input('name'),
            'img_url' => $fileName,
            'description' => $request->input('description')
        ]);
        \Cache::forever('clinics',Clinic::all());
        return redirect('admin/clinic');
    }

    public function getDelete($id)
    {
        Clinic::find($id)->delete();
        \Cache::forever('clinics',Clinic::all());
        return $this->getList();
    }

    public function postEdit(Request $request)
    {
        $clinic = Clinic::find($request->input('id'));
        $destinationPath = 'uploads';
        if ($request->hasFile('image')) {
            $fileName = sha1(microtime()).".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($destinationPath, $fileName);
            $clinic->img_url = $fileName;
        }
        $clinic->name = $request->input('name');
        $clinic->description = $request->input('description');
        $clinic->save();
        \Cache::forever('clinics',Clinic::all());
        return redirect('admin/clinic');
    }



}
