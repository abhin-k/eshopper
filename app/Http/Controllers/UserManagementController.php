<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserManagementController extends Controller
{
    public function __construct()
	{
		$this->middleware('admin');

	}

	public function view(User $user)
	{
		return view('admin.view_user',compact('user'));
	}

  public function new()
  {
    return view('admin.add_user');
  }

  public function add(Request $request)
  {

    $this->validate($request,[
      'name'=>'required|max:255',
      'email'=>'required|unique:users|email',
      'password'=>'required|min:6|confirmed',
      'password_confirmation'=>'required'
    ]);

      $user = new User;
      $user->name  = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->admin = $request->role;
      $user->save();

      return redirect('dashboard/users');

  }



}
