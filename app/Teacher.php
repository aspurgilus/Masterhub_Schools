<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [];

    public function courses()
	{
		return $this->belongsToMany(Course::class);
	}

	public function professions()
	{
		return $this->belongsToMany(Profession::class);
	}
}
