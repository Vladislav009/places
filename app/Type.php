<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Place;

class Type extends Model
{
	protected $fillable = [
        'type'
    ];

	public function places()
    {
    	return $this->hasMany(Place::class);
    }
}
