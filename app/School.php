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
}
