<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function champions()
    {
        return $this->belongsTo(Champion::class, 'champion_id');
    }
}