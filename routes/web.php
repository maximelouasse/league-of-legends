<?php

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

// Avatar
Route::get('/avatars', 'AvatarController@getAllAvatars');
Route::get('/avatars/{id_avatar}', 'AvatarController@getAvatarDetail');
Route::get('/', function () {
    return view('pages/home', [
        'title' => 'Accueil'
    ]);
});

// Champion
Route::get('/champions', 'ChampionController@getAllChampions');
Route::get('/', function() { return view('pages.home'); });
Route::get('/champions/add', 'ChampionController@formAddChampion');
Route::post('/champions/store', 'ChampionController@store');
Route::get('/champions/edit/{idChampion}', 'ChampionController@edit');
Route::put('/champions/update', 'ChampionController@update');
Route::get('/champions/{idChampion}', 'ChampionController@getChampionDetail');
Route::post('/champions/delete/{idChampion}', 'ChampionController@delete');

// Item
Route::get('/items', 'ItemController@getAllItems');
// Route::get('/items', function() { return view('pages.items'); });
Route::get('/items/add', function() { return view('pages.add_item'); });
Route::post('/items/store', 'ItemController@store');
Route::get('/items/edit/{idItem}', function($idItem) { return view('pages.edit_item', ['id_item' => $idItem]); });
Route::post('/items/update', 'ItemController@update');
Route::get('/items/{idItem}', 'ItemController@getItemDetail');
Route::post('/items/delete/{idItem}', 'ItemController@delete');

// Skill
Route::get('/skills', 'SkillController@getAllSkills');
Route::get('/skills/{name_skill}', 'SkillController@getSkillDetail');

// Summoner Spell
Route::get('/summoner_spells', 'SummonerSpellController@getAllSummonerSpells');
Route::get('/summoner_spells/add', function() { return view('pages.add_summoner_spells'); });
Route::get('/summoner_spells/{name_summoner_spell}', 'SummonerSpellController@getSummonerSpellDetail');
Route::post('/summoner_spells/store', 'SummonerSpellController@store');
Route::post('/summoner_spells/delete/{idSummonerSpell}', 'SummonerSpellController@delete');
Route::get('/summoner_spells/edit/{idSummonerSpell}', 'SummonerSpellController@edit');
Route::post('/summoner_spells/update', 'SummonerSpellController@update');