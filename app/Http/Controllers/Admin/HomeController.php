<?php namespace App\Http\Controllers\Admin;

use App\Home;
use App\Http\Controllers\Controller;

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
        Home::create($request->all());
        return $this->getList();
    }

    public function getDelete($id)
    {
        Home::find($id)->delete();
        return $this->getList();
    }

}
