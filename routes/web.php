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

// Champion
Route::get('/', 'ChampionController@getAllChampions');

Route::get('/champions/{name_champion}', 'ChampionController@getChampionDetail');

// Item
Route::get('/items', 'ItemController@getAllItems');

Route::get('/items/{name_item}', 'ItemController@getItemDetail');

// Skill
Route::get('/skills', 'SkillController@getAllSkills');

Route::get('/skills/{name_skill}', 'SkillController@getSkillDetail');

// Summoner Spell
Route::get('/summoner_spells', 'SummonerSpellController@getAllSummonerSpells');

Route::get('/summoner_spells/{name_summoner_spell}', 'SummonerSpellController@getSummonerSpellDetail');