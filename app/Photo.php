<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Place;

class Photo extends Model
{
	protected $fillable = [
        'url',
		'place_id'
    ];

	public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
