<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GoodsInfo;
use Response;

class GoodsController extends Controller
{
	public function findMinPrice($id)
	{
		$goodInfo = GoodsInfo::find($id)->chaoGia()->max('price');
		return Response::json($goodInfo);
	}
}
