<?php namespace App\Http\Controllers\Admin;

use App\Ads;
use App\Clinic;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdsRequest;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;


class ConfigController extends AdminController {

    public function getIndex()
    {
        return view('admin.config');
    }

    public function getUpdate()
    {
        $result =  exec('git pull --rebase');
        return $result;
    }

}
