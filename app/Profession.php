<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $guarded = [];

    public function teachers()
	{
		return $this->belongsToMany(Teacher::class);
	}
}
