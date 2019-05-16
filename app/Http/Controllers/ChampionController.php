<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChampionController extends Controller
{
    function getAllChampions() {
        return response()->view('champion');
    }

    function getChampionDetail( $id_champion ) {
        return response()->view('championDetail', ['id_champion' => $id_champion]);
    }
}
