<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;

class HomeController extends Controller
{

    public function index()
    {
		$products_categories = ProductCategory::with('products')->get();
        return view('home',['products_categories'=>$products_categories]);
    }
}
