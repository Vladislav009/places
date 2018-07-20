<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	protected $fillable = [
        'type'
    ];

	public function places()
    {
    	return $this->hasMany('App\Place');
    }
}
