<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Test;

class TestController extends Controller
{
    public function test(){
        return view('test.index');
    }
    
    public function save(Request $request){
		$input=$request->only('test');
        Test::create($input);
        
    }
	
	public function show()
	{
		$tests = Test::all();
		return view('test',compact('tests'));
	}
}
