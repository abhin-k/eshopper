<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productCategory()
	{
		return $this->belongsTo('App\ProductCategory','category','id');
	}
	
	/*
	* Users Belongs To Product
	*
	*/
	
	public function users()
	{
		return $this->belongsToMany('App\User');
	}
}
