<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
	{
		$this->middleware('admin');
		
	}
	
	/**
	*	Show the form to create a product 
	* 
	*	@return Response
	*/
	public function create()
	{
		$products_categories = ProductCategory::all();
		return view('admin.new_products',['products_categories'=>$products_categories]);
	
	}
	
	/**
	*	Store new product 
	* 
	*	@return Response
	*/
	public function store(Request $request)
	{
		$this->validate($request,[
			'name'=>'bail|required|unique:products|max:255',
			'description'=>'required|min:5',
			'category'=>'required|integer',
			'brand'=>'required',
			'price'=>'required|numeric',
			'discount'=>'integer',
			'image'=>'required|image|mimes:jpeg,jpg,bmp,png|max:2048'			
		]);
		
		$path = $request->image->store('images');
		
		$product = new Product;
		$product->name = $request->name;
		$product->description = $request->description;
		$product->category = $request->category;
		$product->brand = $request->brand;
		$product->price = $request->price;
		$product->discount = $request->discount;
		$product->image = $path;
		
		$category = ProductCategory::find($request->category);
		$category->products()->save($product);
		
		
		$product->save();
		return redirect('dashboard');
		
	}
	
	/**
	*	Delete a product
	*
	*	@return Response
	*/
	public function delete(Product $product)
	{
		$product->delete();
		return back();
		
	}
	
	/**
	*	Show the form to edit a product 
	*
	*	@return Response
	*/
	
	public function edit(Product $product)
	{
		$data['categories'] = ProductCategory::all();
		$data['product'] = $product;
		return view('admin.edit_products',compact('data'));
	}
	
	/**
	*	Update the product 
	*
	*	@return Response
	*/
	
	public function update(Request $request , Product $product)
	{
		$this->validate($request,[
			'name'=>'bail|required|unique:products,name,'.$product->id.'|max:255',
			'description'=>'required|min:5',
			'category'=>'required|integer',
			'brand'=>'required',
			'price'=>'required|numeric',
			'discount'=>'integer'
		]);
		
		$product->name = $request->name;
		$product->description = $request->description;
		$product->category = $request->category;
		$product->brand = $request->brand;
		$product->price = $request->price;
		$product->discount = $request->discount;
		$product->save();
		return redirect('dashboard');
		
	}
	
	
}
