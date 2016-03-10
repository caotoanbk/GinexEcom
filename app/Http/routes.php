<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
	//authenticate
    Route::auth();

	//customer publish info
	Route::get('/publishCarryInfo', 'PublishController@carry');
	Route::get('publishGoodsInfo', 'PublishController@goods');

	//process publish info
	Route::post('publishCarryInfo', 'PublishController@storeCarry');
	Route::post('publishGoodsInfo', 'PublishController@storeGoods');

	//show info
	Route::get('carriers', 'InfoController@viewCarriers');
	Route::get('goods', 'InfoController@viewGoods');
	Route::get('carriers/{carrierInfo}', 'InfoController@showCarrier');

	//welcom page
	Route::get('/', function () { return view('welcome');});

	//home page
	Route::get('/home', ['uses' => 'HomeController@index']);

	//search
	Route::get('search', 'SearchController@search');

	//admin users
	Route::get('admin', ['middleware' => ['auth', 'admin'],'uses' => 'AdminController@index']);
	Route::get('admin/users', ['middleware' => ['auth', 'admin'],'uses' => 'AdminController@showUsers']);
	Route::get('admin/users/create', ['as' => 'users.create', 'middleware' => ['auth', 'admin'],'uses' => 'AdminController@createUser']);
	Route::get('admin/users/edit', ['as' => 'users.edit', 'middleware' => ['auth', 'admin'],'uses' => 'AdminController@deleteUser']);
	Route::get('admin/users/destroy', ['as' => 'users.destroy', 'middleware' => ['auth', 'admin'],'uses' => 'AdminController@deleteUser']);

	//admin carriers
	Route::get('admin/carriers', ['middleware' => ['auth', 'admin'],'uses' => 'AdminController@showCarriers']);
	Route::get('admin/carriers/accept/{id}', ['as' => 'carriers.accept', 'middleware' => ['auth', 'admin'],'uses' => 'AdminController@acceptCarriers']);
	Route::get('admin/carriers/destroy/{id}', ['as' => 'carriers.destroy', 'middleware' => ['auth', 'admin'],'uses' => 'AdminController@destroyCarriers']);
	Route::get('admin/carriers/deny/{id}', ['as' => 'carriers.deny', 'middleware' => ['auth', 'admin'], 'uses' => 'AdminController@denyCarriers']);

	//admin goods
	Route::get('admin/goods', ['middleware' => ['auth', 'admin'], 'uses' => 'AdminController@showGoods']);
	Route::get('admin/goods/accept/{id}', ['as' => 'goods.accept', 'middleware' => ['auth', 'admin'], 'uses' => 'AdminController@acceptGoods']);
	Route::post('admin/goods/change/{id}', ['as' => 'goods.change', 'middleware' => ['auth', 'admin'], 'uses' => 'AdminController@changeGoods']);
	Route::get('admin/goods/delete/{id}', ['as' => 'goods.delete', 'middleware' => ['auth', 'admin'], 'uses' => 'AdminController@deleteGoods']);
	Route::get('admin/goods/deny/{id}', ['as' => 'goods.deny', 'middleware' => ['auth', 'admin'], 'uses' => 'AdminController@denyGoods']);
});
