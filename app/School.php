<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded = [];

	public function owner()
	{
		return $this->belongsTo(User::class);
	}

	public function specializations()
	{
		return $this->hasMany(Specialization::class);
	}
	public function actions()
	{
		return $this->hasMany(Action::class);
	}
}
