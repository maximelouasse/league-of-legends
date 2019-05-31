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

		return response()->view('pages.summoner_spells', ['title' => 'Summoner Spells', 'list_summoner_spells' => $summoner_spells, 'pagination' => $pagination]);
	}
	
	function getSummonerSpellDetail($summonerSpellId) {
		$summoner_spell = SummonerSpell::find($summonerSpellId);
		$result = null;
		$data = $this->callApi();

		foreach($data as $one_data)
		{
			// var_dump($one_data->name, $summoner_spell->name);
			// var_dump($this->similarity($one_data->name, $summoner_spell->name));
			// die();

			if($one_data->name == $summoner_spell->name)
				$result = $one_data;
		}

		return response()->view('pages.detail_summoner_spell', ['title' => $result->name, 'info_summoner_spell' => $result]);
	}

	function store(Request $request)
	{
		$summonerSpellExist = SummonerSpell::where('name', '=', $request->name_summoner_spell);

		if($summonerSpellExist->exists() === true)
		{
			return json_encode(['error' => true]);
		}
		else
		{
			$nameSummonerSpell = $request->name_summoner_spell;

			$summonerSpell = new SummonerSpell();
			$summonerSpell->name = $nameSummonerSpell;
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

		return view('pages.edit_summoner_spell', ['id_summoner_spell' => $summonerSpellId, 'info_summoner_spell' => $summoner_spell]);
	}

	/***************************/

	function similarity($s1, $s2)
	{
		$longer = $s1;
		$shorter = $s2;
		
		if (strlen($s1) < strlen($s2))
		{
			$longer = $s2;
			$shorter = $s1;
		}
		
		$longerLength = strlen($longer);

		if ($longerLength == 0)
		{
			return 1.0;
		}

		return ($longerLength - $this->editDistance($longer, $shorter)) / floatval($longerLength);
	}

	function editDistance($s1, $s2)
	{
		$s1 = strtolower($s1);
		$s2 = strtolower($s2);
	  
		$costs = array();
		
		for ($i = 0; $i <= strlen($s1); $i++)
		{
		  	$lastValue = $i;
			  
			for ($j = 0; $j <= strlen($s2); $j++)
			{
				if ($i == 0)
			  		$costs[$j] = $j;
				else
				{
					if ($j > 0)
					{
						$newValue = $costs[$j - 1];
						
						if ($s1[$i - 1] != $s2[$j - 1])
						{
				  			$newValue = min(min($newValue, $lastValue), $costs[$j]) + 1;
						}
				
						$costs[$j - 1] = $lastValue;
						$lastValue = $newValue;
			  		}
				}
		  	}
		  
			if ($i > 0)
				$costs[strlen($s2)] = $lastValue;
		}
		return $costs[strlen($s2)];
	  }
}
