<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Datatables;
use App\User;
use App\CarriersInfo;
use Auth;
use App\GoodsInfo;
class DatatablesController extends Controller
{
	public function getCarriers()
	{
		return view('datatables.carrier');
	}

	public function carriersData()
	{
		$carriersInfo=CarriersInfo::select(['route','slxe','lxe','htdgoi','tgnhang', 'price', 'description', 'id'])->where('checked', true);
	return Datatables::of($carriersInfo)->addColumn('ycau', function($carrier){ 
		if(Auth::check() && Auth::user()->type=='goods'){
			return '<button id='.$carrier->id.' data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Gui yeu cau</button>';
			}
			return '';
			
	})->make(true);
	}
	public function getGoods()
	{
		return view('datatables.goods');
	}

	public function goodsData()
	{
		$goodsInfo=GoodsInfo::select(['id','htdgoi', 'sluong','tgghang','tgnhang','route', 'name', 'description', 'date', 'created_at'])->where('checked', true);
		
				
		return Datatables::of($goodsInfo)->addColumn('chao_gia', function($goodInfo) {
			if(Auth::check() && Auth::user()->type=='carrier')
				return '<button class="btn btn-xs btn-primary" data-toggle="modal" id='.$goodInfo->id.' data-target="#myModal">Chao gia <span class="badge">'. $goodInfo->chaoGia->count().'</badge></button>';
			else
				return '';	})->editColumn('created_at', '{!! $created_at->diffForHumans() !!}')->make(true);
		
	}

	public function findCarriers($id)
	{
		//$route=GoodsInfo::find($id)->route;
		//$route=iconv('UTF-8'	, 'ASCII//TRANSLIT', $route);
		return view('datatables.find_carriers', compact('id'));
	}
	
	public function findCarriersData($id)
	{
		
		$route=GoodsInfo::find($id)->route;
		$carriersInfo=CarriersInfo::select(['route','slxe','lxe','htdgoi','tgnhang', 'price', 'description'])->where('checked', true)->where('route', 'LIKE', '%'.$route.'%');

		return Datatables::of($carriersInfo)->addColumn('ycau', function($data){ return '<button class="btn btn-primary btn-sm">Gui yeu cau</button>';})->make(true);
	}


	public function cgHh($id)
	{
		$chaogia=GoodsInfo::find($id)->chaoGia()->join('users', 'chaogia.user_id', '=', 'users.id')->select(['users.name', 'chaogia.price', 'chaogia.created_at']);

		return Datatables::of($chaogia)->addColumn('accept', function($cgia){ return '<button class="btn btn-sm btn-primary">Chap nhan</ button>'; })->make(true);
	}
}

