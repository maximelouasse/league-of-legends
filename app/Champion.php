<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    public function skill()
    {
        return $this->hasMany(Skill::class, 'champion_id');
	}
	
    public function avatar()
    {
        return $this->hasOne(Avatar::class, 'id');
    }
	
	public function items()
	{
		return $this->belongsToMany(Item::class)->withTimestamps();
	}

	public function spells()
	{
		return $this->belongsToMany(SummonerSpell::class)->withTimestamps();
	}
}
