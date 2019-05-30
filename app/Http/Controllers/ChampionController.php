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

    function getAllChampions() {
		$champions = Champion::paginate(5);

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
		
		return response()->view('pages.champions', ['list_champions' => $champions, 'pagination' => $pagination]);
    }

    function getChampionDetail($championId) {
		$champion = Champion::find($championId);
		$nameChampion = $champion->name;

		$avatar = Avatar::find($champion->avatar_id);

		$avatar_url = '';

		if($avatar != NULL)
			$avatar_url = $avatar->url;

		$result = $this->callApi($nameChampion);

		return response()->view('pages.detail_champion', ['info_champion' => $result->$nameChampion, 'list_items' => $champion->items()->get(), 'avatar_url' => $avatar_url]);
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
			// Validation
			/*$this->validate($request, [
				'name' => 'required|min:2'
			]);*/
			
			$nameChampion = $request->name_champion;
			
			$champion = new Champion();
			$champion->name = $nameChampion;

			$avatar = new Avatar();
			$avatar->url = $champion->name . '_0.jpg';
			$avatar->save();

			$champion->avatar_id = $avatar->id;
			$champion->save();
			$champion->items()->attach($request->list_items);

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

		return json_encode($champion);
	}

	function delete($championId)
	{
		$champion = Champion::find($championId);

		if($champion != null)
		{
			$champion->avatar()->delete();
			$champion->skill()->delete();
			$champion->delete();
		}
		
		return redirect('/');
	}

	function formAddChampion()
	{
		return response()->view('pages.add_champion', ['list_items' => Item::all()]);
	}

	function edit($championId)
	{
		$champion = Champion::find($championId);

		return view('pages.edit_champion', ['id_champion' => $championId, 'info_champion' => $champion, 'items_champion' => $champion->items()->get(), 'list_items' => Item::all()]);
	}
}