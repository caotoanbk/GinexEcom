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
		$goods->valid=true;
		$goods->save();
		return redirect(url('/admin/goods'));
	}

	public function acceptCarriers($id)
	{
		$carrier=CarriersInfo::find($id);
		$carrier->checked=true;
		$carrier->save();
		return redirect(url('/admin/carriers'));
	}

	public function denyGoods($id)
	{
		$goods=GoodsInfo::find($id);
		$goods->checked=false;
		$goods->valid=false;
		$goods->save();
		return redirect(url('/admin/goods'));
	}

	public function deleteGoods($id)
	{
		$goods=GoodsInfo::findOrFail($id);
		$goods->delete();
		return redirect(url('/admin/goods'));
	}

	public function denyCarriers($id)
	{
		$carriers=CarriersInfo::find($id);
		$carriers->checked=false;
		$carriers->valid=false;
		$carriers->save();
		return redirect(url('/admin/carriers'));
	}

	public function destroyCarriers($id)
	{
		$carrier=CarriersInfo::findOrFail($id);
		$carrier->delete();
		return redirect(url('/admin/carriers'));
	}

}
