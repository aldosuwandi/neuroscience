<?php namespace App\Http\Controllers\Admin;

use App\Home;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateHomeRequest;
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

    public function getCreate()
    {
        $home = new Home();
        return view('admin.home.form')->with('home',$home);
    }

    public function postCreate(CreateHomeRequest $request)
    {
        $destinationPath = 'uploads';
        $fileName = sha1(microtime()).".".$request->file('image')->getClientOriginalExtension();
        Home::create([
            'img_url' => $fileName
        ]);
        $request->file('image')->move($destinationPath, $fileName);
        \Cache::forever('homes',Home::all());
        Flash::success('Home banner baru telah dibuat');
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
