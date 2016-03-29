<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RequireController extends Controller
{
	public function requireCarrier(Request $request)
	{
		return $request->all();
	}
}
