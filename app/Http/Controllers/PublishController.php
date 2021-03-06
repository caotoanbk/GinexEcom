<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CarriersInfo;
use App\GoodsInfo;
use Auth;
use App\Http\Requests\CreateCarrierInfoRequest;
use App\Http\Requests\CreateGoodsInfoRequest;

class PublishController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function carry()
	{
		if(Auth::user()->type=='goods')
			return redirect('/home');
		return view('publish.carry');
	}

	public function goods()
	{
		if(Auth::user()->type=='carrier')
			return redirect('/');  
		return view('publish.goods');
	}

	public function storeCarry(CreateCarrierInfoRequest $request)
	{
		$input =$request->all();
		$input['price'] = str_replace('.','',$input['price']);
		$input['user_id']=Auth::user()->id;
		CarriersInfo::create($input);
		\Session::flash('flash_message', 'Thong tin cua ban duoc dang thanh cong. Chung toi se kiem tra va thong bao lai voi ban');
		return redirect('/home');
	}

	public function storeGoods(CreateGoodsInfoRequest $request)
	{
		$input=$request->all();
		$input['user_id']=Auth::user()->id;
		GoodsInfo::create($input);
		return redirect('/home');
	}

}
