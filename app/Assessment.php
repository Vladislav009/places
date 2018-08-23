<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
	protected $fillable = [
        'like',
        'dislike',
		'assessmentable_id',
		'assessmentable_type'
    ];

	public function assessmentable()
  {
    return $this->morphTo();
  }
}
