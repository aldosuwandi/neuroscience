<?php namespace App\Http\Controllers\Admin;

use App\Ads;
use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdsRequest;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;


class AdsController extends AdminController {

    public function getIndex()
    {
        return $this->getList();
    }

    public function getList($clinicId = null)
    {
        $clinics = Clinic::all();
        if (count($clinics) == 0) {
            Flash::error('Harap buat clinic terlebih dahulu');
            return redirect('/admin/clinic');
        } else {
            $ads = array();
            $clinic = null;
            if (!is_null($clinicId)) {
                $ads = Clinic::find($clinicId)->ads()->getResults();
                $clinic = Clinic::find($clinicId);
            }
            return view('admin.ads.list')
                ->with('clinic',$clinic)
                ->with('clinics',$clinics)
                ->with('clinicId',$clinicId)
                ->with('ads',$ads);
        }
    }

    public function getCreate($id = null)
    {
        $clinics = array();
        if(!is_null($id)) {
            $ads = Ads::find($id);

            $clinicId = $ads->clinic->id;
        } else {
            $ads = new Ads();
            $clinics = Clinic::all();
            $clinicId = null;
        }
        return view('admin.ads.form')
            ->with('ads',$ads)
            ->with('clinics',$clinics)
            ->with('clinicId',$clinicId);
    }

    public function postCreate(CreateAdsRequest $request)
    {
        $destinationPath = 'uploads';
        $fileName = sha1(microtime()).".".$request->file('image')->getClientOriginalExtension();
        Ads::create([
            'clinic_id' => $request->input('clinic_id'),
            'name' => $request->input('name'),
            'img_url' => $fileName,
            'link' => $request->input('link')
        ]);
        $request->file('image')->move($destinationPath, $fileName);
        Flash::success('Ads baru telah dibuat');
        return redirect('/admin/ads/list/'.$request->input('clinic_id'));
    }
    
    public function postEdit(Request $request)
    {
        $ads = Ads::find($request->input('id'));
        if ($request->hasFile('image')) {
            $destinationPath = 'uploads';
            $fileName = sha1(microtime()).".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($destinationPath, $fileName);
            $ads->img_url = $fileName;
        }
        $ads->name = $request->input('name');
        $ads->link = $request->input('link');
        $ads->clinic_id = $request->input('clinicId');
        $ads->save();
        Flash::success('Ads telah diperbaharui');
        return redirect('/admin/ads/list/'.$request->input('clinicId'));
    }

    public function getDelete($id)
    {
        Ads::find($id)->delete();
        Flash::success('Ads telah dihapus');
        return redirect('/admin/ads/list/1');
    }



}
