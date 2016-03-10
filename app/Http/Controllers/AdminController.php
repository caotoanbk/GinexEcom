<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\CarriersInfo;
use App\GoodsInfo;

class AdminController extends Controller
{
	public function index()
	{
		return view('admin.dashboard');
	}

	public function showUsers()
	{
		$users=User::all();
		return view('admin.showUsers', compact('users'));
	}

	public function showCarriers()
	{
		$carriers=CarriersInfo::all();
		return view('admin.showCarriers', compact('carriers'));
	}

	public function showGoods()
	{
		$goods=GoodsInfo::all();
		return view('admin.showGoods', compact('goods'));
	}

	public function acceptGoods($id)
	{
		$goods=GoodsInfo::find($id);
		$goods->checked=true;
		$goods->save();
		return redirect(url('/admin/goods'));
	}
}
