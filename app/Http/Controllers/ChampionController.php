<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ChampionController extends Controller
{
    function getAllChampions() {
        return response()->view('pages.champions');
    }

    function getChampionDetail( $name_champion ) {
		$client = new Client();
		$res = $client->request('GET', 'http://ddragon.leagueoflegends.com/cdn/6.24.1/data/fr_FR/champion/' . $name_champion . '.json');
		$result = $res->getBody()->getContents();
		//var_dump(json_decode($result)->data->$name_champion->title);
		return response()->view('pages.championDetail', ['title_champion' => json_decode($result)->data->$name_champion->title]);
    }
}
