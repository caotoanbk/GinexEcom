<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CarriersInfo;
use App\GoodsInfo;
use Gate;
use User;

class InfoController extends Controller
{
	public function viewCarriers()
	{
		$carriersInfo=CarriersInfo::where('checked', 1)->get();
		return view('info.carriers', compact('carriersInfo'));
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
}
