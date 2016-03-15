<?php

namespace App\Http\Controllers;


use App\Chao_gia;
use Response;
use Illuminate\Http\Request;
class AjaxController extends Controller
{

	public function chaogia(Request $request)
	{
		$chaogia = Chao_gia::create($request->all());

		return Response::json($chaogia); 
	}	
	
}
