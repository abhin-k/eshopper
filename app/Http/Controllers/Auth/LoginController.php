<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;
	 
	protected $redirectTo = '/';
	
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
	
	protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => Lang::get('auth.failed'),
            ],'login');
    }
	
	public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
	
	public function authenticated($request , $user)
	{
		if($user->admin==1)
			return redirect('dashboard') ;
			
		else
			return redirect('/') ;
	}
}
