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
	Route::get('/publishGoodsInfo', 'PublishController@goods');

	//process publish info
	Route::post('/publishCarryInfo', 'PublishController@storeCarry');
	Route::post('/publishGoodsInfo', 'PublishController@storeGoods');
	//process update info 
	Route::patch('carrier/{id}/update', 'InfoController@updateCarrier');
	Route::patch('goods/{id}/update', 'InfoController@updateGoods');

	//show info
	Route::get('carriers/{carrierInfo}', 'InfoController@showCarrier');
	Route::get('goods/{goodsInfo}', 'InfoController@showGoods');

	//welcom page
	Route::get('/', function () { return view('welcome');});

	//home page
	Route::get('/home', ['uses' => 'HomeController@index']);

	//edit item 
	Route::get('/goods-edit/{id}', 'EditController@editGoods');
	Route::post('/goods-edit/{id}', 'EditController@updateGoods');

	//delete item 
	Route::get('/delete-carrier/{id}', 'InfoController@deleteCarrier');
	Route::get('/delete-goods/{id}', 'InfoController@deleteGoods');

	Route::get('/carrier-edit/{id}', 'EditController@editCarrier');
	Route::post('/carrier-edit/{id}', 'EditController@updateCarrier');
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


	Route::get('van-tai',['as' => 'vantai', 'uses' => 'DatatablesController@getCarriers']);
	Route::get('van-tai/data',['as' => 'vantai.data', 'uses' => 'DatatablesController@carriersData']);
	Route::get('hang-hoa',['as' => 'hanghoa', 'uses' => 'DatatablesController@getGoods']);
	Route::get('hanghoa/data',['as' => 'hanghoa.data', 'uses' => 'DatatablesController@goodsData']);

	//ajax request 
	Route::get('ajax/chaogia', ['middleware' => 'auth', 'uses' => 'AjaxController@chaogia']);
	Route::get('ajax/test','AjaxController@test');
    
    //route test
    Route::get('/test', 'TestController@test');
    Route::post('/test', 'TestController@save');
	Route::get('alltest', 'TestController@show');

	//route find suitable carrier 
	Route::get('/van-tai/{id}', ['as' => 'vantai.timkiem', 'uses' => 'DatatablesController@findCarriers']);
	Route::get('tim-kiem-van-tai/{id}', ['as' => 'vantai.timkiem.data', 'uses' => 'DatatablesController@findCarriersData']);
	//route find suitable goods
	Route::get('/hang-hoa/{id}', ['as' => 'hhoa.timkiem', 'uses' => 'DatatablesController@findGoods']);
	Route::get('/tim-kiem-hang-hoa/{id}', ['as' => 'hhoa.timkiem.data', 'uses' => 'DatatablesController@findGoodsData']);


	Route::get('/ajax-carrier-detail/{id}', 'CarrierController@detail');

	//route find min price of goods 
	Route::get('/min-price/{id}', 'GoodsController@findMinPrice');

	//route chao gia hang hoa 
	Route::get('/chao-gia-hh/{id}', ['as' => 'chaogia.hanghoa.data', 'uses' => 'DatatablesController@cgHh']);

	//route carrier request from goods 
	Route::get('/ajax-carrier-request/{id}', 'AjaxController@requestCarrier');
});
