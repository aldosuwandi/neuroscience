<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Auth\Guard;

class AuthController extends Controller {


    protected $user;

    protected $auth;

    public function __construct(Guard $auth, User $user)
    {
        $this->user = $user;
        $this->auth = $auth;
        $this->middleware('guest', ['except' => ['getLogout']]);
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('username', $request->input('username'))
            ->where('password', md5($request->input('password')))
            ->first();
        if (!is_null($user)) {
            $this->auth->login($user);
            return redirect()->intended('/admin/clinic');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/auth/login');
    }





}
