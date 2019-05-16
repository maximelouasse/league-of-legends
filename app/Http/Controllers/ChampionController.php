<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChampionController extends Controller
{
    function getAllChampions() {
        return response()->view('pages.champion');
    }

    function getChampionDetail( $id_champion ) {
        return response()->view('pages.championDetail', ['id_champion' => $id_champion]);
    }
}
