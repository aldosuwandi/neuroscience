<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

abstract class AdminController extends Controller {

    function __construct()
    {
        $this->middleware('auth');
    }

}
