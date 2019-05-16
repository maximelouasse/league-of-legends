<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
	}
	
    public function avatar()
    {
        return $this->belongsTo(Creator::class, 'avatar_id');
    }
	
	public function items()
	{
		return $this->belongsToMany(Item::class)->withTimestamps();
	}

	public function summonerSpells()
	{
		return $this->belongsToMany(SummonerSpell::class)->withTimestamps();
	}
}
