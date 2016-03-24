<?php

namespace App\Http\Controllers;


use App\Chao_gia;
use Response;
use Illuminate\Http\Request;
use App\CarriersInfo;
use App\CarrierRequire;
use Auth;

class AjaxController extends Controller
{

	public function chaogia(Request $request)
	{
		if( !$request->ajax() )
			return redirect('/');
		$chaogia = Chao_gia::create($request->all());
		return Response::json($chaogia); 
	}	
	
	public function requestCarrier($id, Request $request)
	{
		if( !$request->ajax() )
			return redirect('/');
		$input=$request->all();
		$input['user_id'] = Auth::user()->id;
		$carrier = CarrierRequire::create($input);
		return Response::json($carrier);
	}
}
