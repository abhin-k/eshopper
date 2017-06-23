<?php


Auth::routes();

Route::get('/','HomeController@index');
Route::get('logout', 'Auth\LoginController@logout');

Route::get('dashboard','AdminController@index');
Route::get('dashboard/users','AdminController@users');
Route::get('test','TestController@index');

Route::get('dashboard/products/new','ProductController@create');
Route::post('dashboard/add_product','ProductController@store');
Route::get('dashboard/category/new','CategoryController@create');
Route::put('dashboard/category/store','CategoryController@store');

Route::get('mycart','ProfileController@mycart');
Route::post('sendtocart','ProfileController@sendtocart');
Route::post('deletefromcart','ProfileController@deletefromcart');

Route::get('allusers','AdminController@downloaduserscsv');
Route::get('dashboard/users/new','UserManagementController@new');
Route::post('dashboard/users/add','UserManagementController@add');

Route::post('mycart/add/{product}','ProfileController@addtocart');

Route::patch('dashboard/category/{category}','CategoryController@update');
Route::patch('dashboard/products/{product}','ProductController@update');

Route::get('dashboard/products/delete/{product}','ProductController@delete');
Route::get('dashboard/products/edit/{product}','ProductController@edit');
Route::get('dashboard/category/{category}','CategoryController@view');

Route::get('dashboard/users/{user}','UserManagementController@view');
