<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Champion;
use App\Item;
use App\Avatar;
use App\Skill;
use App\SummonerSpell;
use function GuzzleHttp\json_encode;

// http://ddragon.leagueoflegends.com/cdn/6.24.1/data/fr_FR/champion.json

class ChampionController extends Controller
{
	function callApi($nameChampion)
	{
		$client = new Client();
		$res = $client->request('GET', 'http://ddragon.leagueoflegends.com/cdn/6.24.1/data/fr_FR/champion/' . $nameChampion . '.json');
		$result = $res->getBody()->getContents();

		return json_decode($result)->data;
	}

	function callApiItems()
	{
		$client = new Client();
		$res = $client->request('GET', 'http://ddragon.leagueoflegends.com/cdn/6.24.1/data/fr_FR/item.json');
		$result = $res->getBody()->getContents();

		return json_decode($result)->data;
	}

    function getAllChampions() {
		$champions = Champion::paginate(12);

		$pagination = [
			'pagination' => [
				'total' =>	$champions->total(),
                'per_page' => $champions->perPage(),
                'current_page' => $champions->currentPage(),
                'last_page' => $champions->lastPage(),
                'from' => $champions->firstItem(),
                'to' => $champions->lastItem()
            ]
		];
		
		foreach($champions as $champion)
		{
			$avatar = Avatar::find($champion->avatar_id);
			if($avatar != null)
			{
				$champion->avatar_url = $avatar->url;
			}
		}

		return response()->view('pages.champions', [
			'title' => 'Champions', 
			'idCss'=>'champions',
			'list_champions' => $champions, 
			'pagination' => $pagination
		]);
	}

    function getChampionDetail($championId) {
		$champion = Champion::find($championId);

		if($champion != NULL)
		{
			$nameChampion = $champion->name;

			$avatar = Avatar::find($champion->avatar_id);

			$avatar_url = '';

			if($avatar != NULL)
				$avatar_url = $avatar->url;

			$result = $this->callApi($nameChampion);

			return response()->view('pages.detail_champion', [
				'title' => 'detail'.$champion->name, 
				'idCss'=>'detailChampion',
				'info_champion' => $result->$nameChampion,
				'id_champion' => $champion->id,
				'list_items' => $champion->items()->get(),
				'list_summoner_spells' => $champion->spells()->get(),
				'avatar_url' => $avatar_url
				]
			);
		}
		else
		{
			return response()->view('pages.detail_champion', ['title' => 'Erreur' , 'error' => true]);
		}
	}
	
	function store(Request $request)
	{
		$championExist = Champion::where('name', '=', $request->name_champion);

		if($championExist->exists() === true)
		{
			return json_encode(['error' => true]);
		}
		else
		{			
			$nameChampion = $request->name_champion;
			
			$champion = new Champion();
			$champion->name = $nameChampion;

			$avatar = new Avatar();
			$avatar->url = $champion->name . '_0.jpg';
			$avatar->save();

			$champion->avatar_id = $avatar->id;
			$champion->save();
			$champion->items()->attach($request->list_items);
			$champion->spells()->attach($request->list_summoner_spells);

			$result = $this->callApi($nameChampion);

			foreach($result->$nameChampion->spells as $skill)
			{
				$new_skill = new Skill();
				$new_skill->key = $skill->id;
				$new_skill->name = $skill->name;
				$new_skill->champions()->associate($champion);
        		$new_skill->save();
			}

			return $champion;
		}
	}

	function update(Request $request)
	{
		$champion = Champion::find($request->id_champion);
		$champion->name = $request->name_champion;
		$champion->save();

		$champion->items()->detach();
		$champion->items()->attach($request->list_items);
		
		$champion->spells()->detach();
		$champion->spells()->attach($request->list_summoner_spells);

		return json_encode($champion);
	}

	function delete($championId)
	{
		$champion = Champion::find($championId);

		if($champion != null)
		{
			$champion->avatar()->delete();
			$champion->skill()->delete();
			$champion->items()->detach();
			$champion->spells()->detach();
			$champion->delete();
		}
		
		return redirect('/');
	}

	function formAddChampion()
	{
		return response()->view('pages.add_champion', [
			'title' => 'Ajouter un champion', 
			'idCss'=>'addChampion',
			'list_items' => Item::all(),
			'list_summoner_spells' => SummonerSpell::all()
		]);
	}

	function edit($championId)
	{
		$champion = Champion::find($championId);

		return view('pages.edit_champion', [
			'title' => 'Modifier ' .$champion->name, 
			'idCss'=>'editChampion',
			'id_champion' => $championId, 
			'info_champion' => $champion, 
			'items_champion' => $champion->items()->get(),
			'summoner_spells_champion' => $champion->spells()->get(),
			'list_items' => Item::all(),
			'list_summoner_spells' => SummonerSpell::all()
			]
		);
	}
}