<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function champions()
	{
		return $this->belongsToMany(Champion::class)->withTimestamps();
	}
}
