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
		$carriersInfo=CarriersInfo::select(['route', 'price', 'description'])->where('checked', true);
		return Datatables::of($carriersInfo)->make(true);
	}
	public function getGoods()
	{
		return view('datatables.goods');
	}

	public function goodsData()
	{
		$goodsInfo=GoodsInfo::select(['id','route', 'name', 'description', 'date', 'created_at'])->where('checked', true);
		
				
		return Datatables::of($goodsInfo)->addColumn('chao_gia', function($goodInfo) { return '<button class="btn btn-xs btn-primary">Chao gia <span class="badge">'. $goodInfo->chaoGia->count().'</badge></button>'; })->editColumn('created_at', '{!! $created_at->diffForHumans() !!}')->make(true);
		
	}

}
