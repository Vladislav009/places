<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
use App\Photo;
use App\Assessment;

class Place extends Model
{
    protected $fillable = [
        'name',
        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

	public function photos()
    {
        return $this->hasMany(Photo::class);
    }

	public function assessments()
    {
        return $this->morphMany(Assessment::class, 'assessmentable');
    }

	public function scopeRating($query)
	{
		return $query->where('type_assessment_id',1)->count();
	}


}
