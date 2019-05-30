<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    public function champion()
    {
        return $this->hasOne(Champion::class, 'avatar_id');
    }
}