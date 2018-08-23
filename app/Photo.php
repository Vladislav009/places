<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Place;
use App\Assessment;

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

    public function assessments()
    {
        return $this->morphMany(Assessment::class, 'assessmentable');
    }
}
