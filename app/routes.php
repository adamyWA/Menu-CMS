<?php
//For logging in
Route::any('admin/logout', 'AccountController@logout');
Route::get('admin', 'AccountController@showLogin');	
Route::post('admin', 'AccountController@checkLogin');	
//For adding new item
Route::get('admin/new', 'MenuController@newItemGet');
Route::post('admin/new', 'MenuController@newItemPost');
//For showing a single item 
Route::get('menu/{slug}', 'MenuController@showSingle');
//For editing items
Route::get('admin/edit/{slug}', 'MenuController@editSingleGet');
Route::post('admin/edit/{slug}', 'MenuController@editSinglePost');
//For editing categories
Route::get('admin/category/edit/{slug}', 'CategoryController@showCategory');
Route::post('admin/category/edit/{slug}', 'CategoryController@editCategory');
//For adding a new category 
Route::get('admin/category/new', 'CategoryController@addCategoryGet');
Route::post('admin/category/new', 'CategoryController@addCategoryPost');
//For showing the entire menu
Route::any('/', 'MenuController@showMenu');
Route::any('/menu', 'MenuController@showMenu');


Route::get('admin/edit/{slug}/delete', 'MenuController@deleteItemGet');
Route::post('admin/edit/{slug}/delete', 'MenuController@deleteItemPost');

	
Route::get('admin/category/edit/{slug}/delete', 'CategoryController@deleteCategoryGet');
Route::post('admin/category/edit/{slug}/delete', 'CategoryController@deleteCategoryPost');

Route::get('admin/account/edit/email', 'AccountController@editAccountGetEmail');
Route::post('admin/account/edit/email', 'AccountController@editAccountPostEmail');

Route::get('admin/account/edit/password', 'AccountController@editAccountGetPassword');
Route::post('admin/account/edit/password', 'AccountController@editAccountPostPassword');

Route::get('/remind','RemindersController@getRemind');
Route::controller('password', 'RemindersController');

Route::get('admin/account/edit/restaurant', 'RestaurantController@editRestaurantGet');
Route::post('admin/account/edit/restaurant', 'RestaurantController@editRestaurantPost');

Route::get('/passwd', function(){
return \Hash::make(\Input::get('Plaintext'));
});



