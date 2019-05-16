<?php

	use GuzzleHttp\Exception\GuzzleException;
	use GuzzleHttp\Client;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$champ = 'Lux';
	$client = new Client();
	$res = $client->request('GET', 'http://ddragon.leagueoflegends.com/cdn/6.24.1/data/en_US/champion/' . $champ . '.json');
	//$res = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
	$result = $res->getBody()->getContents();
	var_dump(json_decode($result)->data->$champ->title);
    //return view('welcome');
});

Route::get('/', 'ChampionController@getAllChampions');

Route::get('/champions/{id_champion}', 'ChampionController@getChampionDetail');
