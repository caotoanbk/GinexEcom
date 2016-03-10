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
    Route::auth();

	Route::get('/publishCarryInfo', 'PublishController@carry');
	Route::get('publishGoodsInfo', 'PublishController@goods');

	Route::post('publishCarryInfo', 'PublishController@storeCarry');
	Route::post('publishGoodsInfo', 'PublishController@storeGoods');

	Route::get('carriers', 'InfoController@viewCarriers');
	Route::get('goods', 'InfoController@viewGoods');
	Route::get('carriers/{carrierInfo}', 'InfoController@showCarrier');

	Route::get('/', function () { return view('welcome');});

	Route::get('search', 'SearchController@search');

	Route::get('admin', ['middleware' => ['auth', 'admin'],'uses' => 'AdminController@index']);
	Route::get('admin/users', ['middleware' => ['auth', 'admin'],'uses' => 'AdminController@showUsers']);
	Route::get('admin/users/create', ['as' => 'users.create', 'middleware' => ['auth', 'admin'],'uses' => 'AdminController@createUser']);
	Route::get('admin/users/edit', ['as' => 'users.edit', 'middleware' => ['auth', 'admin'],'uses' => 'AdminController@deleteUser']);
	Route::get('admin/users/destroy', ['as' => 'users.destroy', 'middleware' => ['auth', 'admin'],'uses' => 'AdminController@deleteUser']);

	Route::get('admin/carriers', ['middleware' => ['auth', 'admin'],'uses' => 'AdminController@showCarriers']);
	Route::get('admin/carriers/accept', ['as' => 'carriers.accept', 'middleware' => ['auth', 'admin'],'uses' => 'AdminController@acceptCarriers']);
	Route::get('admin/carriers/destroy', ['as' => 'carriers.destroy', 'middleware' => ['auth', 'admin'],'uses' => 'AdminController@destroyCarriers']);

	Route::get('admin/goods', ['middleware' => ['auth', 'admin'], 'uses' => 'AdminController@showGoods']);
	Route::get('admin/goods/accept', ['as' => 'goods.accept', 'middleware' => ['auth', 'admin'], 'uses' => 'AdminController@acceptGoods']);
	Route::get('admin/goods/destroy', ['as' => 'goods.destroy', 'middleware' => ['auth', 'admin'], 'uses' => 'AdminController@destroyGoods']);

});
