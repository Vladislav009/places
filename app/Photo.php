<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $fillable = [
        'url',
		'place_id'
    ];

	public function place()
    {
    	return $this->belongsTo('App\Place');
    }
}
