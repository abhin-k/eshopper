<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
		
	}
	
	public function create()
	{
		$products_categories = ProductCategory::all();
		return view('admin.categories',['products_categories'=>$products_categories]);
	}
	
	public function store(Request $request)
	{
		$this->validate($request, [
			'category_name' => 'required|unique:products_categories,name|max:255',
		]);
		
		$products_category = new ProductCategory;
		$products_category->name = $request->category_name;
		$products_category->publish = 0 ; 
		$products_category->save();
	
		return redirect('dashboard');
		
	}
	
	public function view(ProductCategory $category)
	{
		//Lazy loading categories with products
		$category->load('products');
		return view('admin.edit_category',compact('category'));
	}
	
	public function update(Request $request , ProductCategory $category)
	{
		$this->validate($request, [
			'category_name' => 'required|unique:products_categories,name,'.$category->id.'|max:255',
		]);
		
		$category->name = $request->category_name;
		$category->save();
		
		return redirect('dashboard');
	}
	
	
	
}
