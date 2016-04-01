<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CarrierRequire;
use Auth;

class RequireController extends Controller
{
	public function requireCarrier(Request $request)
	{
		Auth::user()->carrierReq()->create($request->all());
		return redirect('/home');
	}
}
