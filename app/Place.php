<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'name',
        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

	public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
