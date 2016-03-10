<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CarriersInfo;
use App\GoodsInfo;

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
		return view('info.showCarry', compact('carrierInfo'));
	}

	public function showGoods(GoodsInfo $goodsInfo)
	{
		return view('info.showGoods', compact('goodsInfo'));
	}
}
