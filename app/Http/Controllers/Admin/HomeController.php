<?php namespace App\Http\Controllers\Admin;

use App\Home;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateHomeRequest;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class HomeController extends AdminController {

    public function getIndex()
    {
        return $this->getList();
    }

    public function getList()
    {
        $homes = Home::all();
        return view('admin.home.list')->with('homes',$homes);
    }

    public function getCreate($id = null)
    {
        if (!is_null($id)) {
            $home = Home::find($id);
        } else {
            $home = new Home();
        }
        return view('admin.home.form')->with('home',$home);
    }

    public function postCreate(CreateHomeRequest $request)
    {
        $fileName = $this->uploads($request,'image');
        $input = $request->all();
        $input['img_url'] = $fileName;
        Home::create($input);
        \Cache::forever('homes',Home::all());
        Flash::success('Home banner baru telah dibuat');
        return redirect('admin/home');
    }

    public function postEdit(Request $request)
    {
        $home = Home::find($request->input('id'));
        if ($request->hasFile('image')) {
            $fileName = $this->uploads($request,'image');
            $home->img_url = $fileName;
        }
        $home->title = $request->input('title');
        $home->caption = $request->input('caption');
        $home->link = $request->input('link');
        $home->save();
        Flash::success('Home banner telah diperbaharui');
        return redirect('admin/home');
    }

    public function getDelete($id)
    {
        Home::find($id)->delete();
        \Cache::forever('homes',Home::all());
        Flash::success('Home banner telah dihapus');
        return redirect('admin/home');
    }

}
