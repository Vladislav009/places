<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Assessment extends Model
{
	protected $fillable = [
        'assessment',
		'type_assessment_id',
		'assessmentable_id',
		'assessmentable_type'
    ];

	public function assessmentable()
  {
    return $this->morphTo();
  }

  public function scopeLikes($query)
  {
 	 return $query->where('type_assessment_id',1)->count();
  }

  public function scopeDis($query)
  {
	  return $query->where('type_assessment_id',2)->count();
  }

}
