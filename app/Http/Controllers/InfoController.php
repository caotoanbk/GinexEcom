<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CarriersInfo;
use App\GoodsInfo;
use App\Http\Requests\CreateCarrierInfoRequest;
use App\Http\Requests\CreateGoodsInfoRequest;
use Gate;

class InfoController extends Controller
{
	public function viewCarriers()
	{
		$carriersInfo=CarriersInfo::where('checked', 1)->get();
		return view('info.carriers', compact('carriersInfo'));
	}
	public function updateCarrier($id, CreateCarrierInfoRequest $request)
	{

		$carrier = CarriersInfo::findOrFail($id);
		$carrier->update($request->all());
		return redirect('/home');
	}

	public function updateGoods($id, CreateGoodsInfoRequest $request)
	{
		$goods= GoodsInfo::findOrFail($id);
		$goods->update($request->all());
		return redirect('/home');
	}
	public function viewGoods()
	{
		$goodsInfo=GoodsInfo::where('checked', 1)->get();
		return view('info.cargo', compact('goodsInfo'));
	}

	public function showCarrier(CarriersInfo $carrierInfo)
	{
		if(Gate::denies('update-carrier', $carrierInfo)){
			abort(403);
		}
		return view('info.showCarry', compact('carrierInfo'));
	}

	public function showGoods(GoodsInfo $goodsInfo)
	{
		if(Gate::denies('update-goods', $goodsInfo)){
			abort(403);
		}
		return view('info.showGoods', compact('goodsInfo'));
	}

	public function deleteCarrier($id)
	{
		$carrier = CarriersInfo::findOrFail($id);
		if(Gate::denies('update-carrier', $carrier)){
			abort(403);
		}
		$carrier->delete();
		return redirect('/home');
	}
	public function deleteGoods($id)
	{
		$goods = GoodsInfo::findOrFail($id);
		if(Gate::denies('update-goods', $goods)){
			abort(403);
		}
		$goods->delete();
		return redirect('/home');
	}
}
