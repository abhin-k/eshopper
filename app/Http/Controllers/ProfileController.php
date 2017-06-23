<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;

class ProfileController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function mycart()
	{
		
		$user = Auth::user();
		$carts = $user->products->all();
		//dd($carts);
		return view('cart',compact('user'));
		
	}
	
	/*
	* Ajax post for add to cart
	*
	*/
	
	public function sendtocart(Request $request)
	{
		
		$product_id = $request->product_id ;
		$user = Auth::user();
		
		//check for duplicate entries
		if($user->products->contains($product_id)){
			return "failed";
		
		}
		
		//add to pivot table	
		$user->products()->attach($product_id);
		$cart_total = $user->products->count();
		$cart_total++;
		return $cart_total;
		
	}
	
	
	public function deletefromcart(Request $request)
	{
		
		$user = Auth::user();
		$product_id = $request->product_id;
		$user->products()->detach($product_id);
		return "success";
	}
	
	
	
}
