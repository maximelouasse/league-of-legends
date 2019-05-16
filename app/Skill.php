<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function champions()
    {
        return $this->hasMany(Champion::class, 'skill_id');
    }
}
