<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\Response;
use Image; 

class TestController extends Controller
{
    public function index()
	{
		$img = Image::make('images/home/iframe3.png');
		//$img = Image::canvas(800, 600, '#ccc')->resize(320, 240);
		return $img->response('jpg');
	}
	
	public function create(Request $request) {
		
		echo $request->test;
	}
}
