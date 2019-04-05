<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $fillable = ['name', 'position'];
	
	public function projects(){
		return $this->belongsToMany('App\Project');
	}
	
}
