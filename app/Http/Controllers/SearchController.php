<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class SearchController extends Controller
{
	public function search(Request $request)
	{
		$query = $request->get('q');
		
		$carriersInfo = DB::table('CarriersInfo')->where('route', 'LIKE', '%'. $query .'%')->orWhere('description', 'LIKE', '%'. $query .'%')->get();

		$goodsInfo = DB::table('GoodsInfo')->where('name', 'LIKE', '%'. $query. '%')->orWhere('description', 'LIKE', '%'. $query .'%')->get();

		return view('pages.search', compact('query','carriersInfo', 'goodsInfo'));
	}
}
