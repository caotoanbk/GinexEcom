<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CarriersInfo;
use Response;
use App\Http\Controllers\Controller;

class CarrierController extends Controller
{
	public function detail($id)
	{
		$carrier = CarriersInfo::find($id);
		return Response::json($carrier);
	}
}
