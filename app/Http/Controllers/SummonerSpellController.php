<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SummonerSpellController extends Controller
{
    function getAllSummonerSpells() {
        return response()->view('pages.summoner_spells');
    }
}
