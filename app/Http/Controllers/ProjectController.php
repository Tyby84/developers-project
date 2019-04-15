<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Developer;


class ProjectController extends Controller
{
    //
	public function get($id)
    {
        $developer = Developer::find($id);
		$project = $developer->projects()->first();
			return response()->json($project); 
		
        
    }
}
