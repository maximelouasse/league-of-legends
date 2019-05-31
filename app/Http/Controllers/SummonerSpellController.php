<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\SummonerSpell;

class SummonerSpellController extends Controller
{
	function callApi()
	{
		$client = new Client();
		$res = $client->request('GET', 'http://ddragon.leagueoflegends.com/cdn/6.24.1/data/fr_FR/summoner.json');
		$result = $res->getBody()->getContents();

		return json_decode($result)->data;
	}

	function getAllSummonerSpells()
	{
		$summoner_spells = SummonerSpell::paginate(5);

		$pagination = [
			'pagination' => [
				'total' =>	$summoner_spells->total(),
                'per_page' => $summoner_spells->perPage(),
                'current_page' => $summoner_spells->currentPage(),
                'last_page' => $summoner_spells->lastPage(),
                'from' => $summoner_spells->firstItem(),
                'to' => $summoner_spells->lastItem()
            ]
		];

		return response()->view('pages.summoner_spells', [
			'title' => 'Summoner Spells',
			'idCss' => 'summonerSpells',
			'list_summoner_spells' => $summoner_spells, 
			'pagination' => $pagination
		]);
	}
	
	function getSummonerSpellDetail($summonerSpellId) {
		$summoner_spell = SummonerSpell::find($summonerSpellId);
		$result = null;
		$data = $this->callApi();

		foreach($data as $one_data)
		{
			if($one_data->name == $summoner_spell->name)
				$result = $one_data;
		}

		return response()->view('pages.detail_summoner_spell', [
			'title' => $result->name,
			'idCss' => 'detailSummonerSpell',  
			'info_summoner_spell' => $result
		]);
	}

	function store(Request $request)
	{
		$summonerSpellExist = SummonerSpell::where('name', '=', $request->name_summoner_spell);
		$data = $this->callApi();

		if($summonerSpellExist->exists() === true)
		{
			return json_encode(['error' => true]);
		}
		else
		{
			$nameSummonerSpell = $request->name_summoner_spell;

			$summonerSpell = new SummonerSpell();
			$summonerSpell->name = $nameSummonerSpell;

			foreach($data as $spell)
			{
				if($spell->name == $summonerSpell->name)
					$summonerSpell->key = $spell->id;
			}

			$summonerSpell->save();

			return $summonerSpell;
		}
	}

	function update(Request $request)
	{
		$summoner_spell = SummonerSpell::find($request->id_summoner_spell);
		$summoner_spell->name = $request->name_summoner_spell;
		$summoner_spell->save();

		return json_encode($summoner_spell);
	}

	function delete($summonerSpellId)
	{
		$summoner_spell = SummonerSpell::find($summonerSpellId);

		if($summoner_spell != null)
		{
			$summoner_spell->delete();
		}
		
		return redirect('/summoner_spells');
	}

	function edit($summonerSpellId)
	{
		$summoner_spell = SummonerSpell::find($summonerSpellId);

		return view('pages.edit_summoner_spell', [
			'id_summoner_spell' => $summonerSpellId, 
			'title' => 'Modification du summoners spell ' . $summonerSpellId,
			'idCss' => 'editSummonerSpell', 
			'info_summoner_spell' => $summoner_spell
		]);
	}
}
