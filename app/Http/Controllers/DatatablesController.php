<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Datatables;
use App\User;
use App\CarriersInfo;
use App\GoodsInfo;
class DatatablesController extends Controller
{
	public function getCarriers()
	{
		return view('datatables.carrier');
	}

	public function carriersData()
	{
		$carriersInfo=CarriersInfo::select(['route', 'price', 'description']);
		return Datatables::of($carriersInfo)->make(true);
	}
	public function getGoods()
	{
		return view('datatables.goods');
	}

	public function goodsData()
	{
		$goodsInfo=GoodsInfo::select(['route', 'name', 'description', 'date']);
		return Datatables::of($goodsInfo)->make(true);
	}

}
