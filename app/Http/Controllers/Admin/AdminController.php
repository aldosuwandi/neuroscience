<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

abstract class AdminController extends Controller {

    function __construct()
    {
        $this->middleware('auth');
    }

    protected function uploads($request,$imageName,$dir = 'uploads')
    {
        $destinationPath = $dir;
        $fileName = sha1(microtime()).".".$request->file($imageName)->getClientOriginalExtension();
        $request->file($imageName)->move($destinationPath, $fileName);
        return $fileName;
    }

}
