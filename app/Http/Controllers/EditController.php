<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GoodsInfo;
use Response;

class EditController extends Controller
{
	public function editGoods($id)
	{
		$goods=GoodsInfo::find($id);
		return Response::json($goods);
	}

}
