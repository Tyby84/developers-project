<?php

namespace App\Http\Controllers;
use App\Developer;

use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    //
	public function index(){
		return view('app');
	}
	
	public function get(Request $request)
    {
        $developer = Developer::orderBy('created_at', 'desc')->get();
        return response()->json($developer);
    }
	
	public function store(Request $request)
    {
        $developer = Developer::create($request->all());

        return response()->json($developer);
    }
	
	public function delete($id)
    {
        Developer::destroy($id);

        return response()->json("ok");
    }
}

