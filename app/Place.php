<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
use App\Photo;

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
}
