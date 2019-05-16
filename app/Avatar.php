<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    public function champion()
    {
        return $this->belongsTo(Champion::class, 'avatar_id');
    }
}