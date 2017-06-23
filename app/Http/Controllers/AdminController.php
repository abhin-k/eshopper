<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Response;


class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin', ['except' => 'logout']);
	}
	
	public function index()
	{

		$data['products'] = Product::all();
		$data['categories'] = ProductCategory::all(); 
		return view('admin.index',compact('data'));
	}
	
	/*
	*	Download all users info as CSV
	*/
	
	public function downloaduserscsv()
	{
		$table = User::all();
		$filename = "users.csv";
		$handle = fopen($filename, 'w+');
		fputcsv($handle, array('id','name','email_address'));

		foreach($table as $row) {
			fputcsv($handle, array($row->id,$row->name, $row->email));
		}

		fclose($handle);

		$headers = array(
			'Content-Type' => 'text/csv',
		);

		return Response::download($filename, 'users.csv', $headers);
	}
	
	public function users()
	{
		
		$users = User::all();
		return view('admin.user_management',compact('users'));
	}
	
}
