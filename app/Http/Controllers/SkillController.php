<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Skill;

class SkillController extends Controller
{
	function callApi($nameChampion)
	{
		$client = new Client();
		$res = $client->request('GET', 'http://ddragon.leagueoflegends.com/cdn/6.24.1/data/fr_FR/champion/' . $nameChampion . '.json');
		$result = $res->getBody()->getContents();

		return json_decode($result)->data;
	}

	function getAllSkills()
	{
		$skills = Skill::paginate(10);

		$pagination = [
			'pagination' => [
				'total' =>	$skills->total(),
                'per_page' => $skills->perPage(),
                'current_page' => $skills->currentPage(),
                'last_page' => $skills->lastPage(),
                'from' => $skills->firstItem(),
                'to' => $skills->lastItem()
            ]
		];

		return response()->view('pages.skills', [
			'title' => 'Skills', 
			'idCss' => 'skills', 
			'list_skills' => $skills,
			'pagination' => $pagination
		]);
	}
	
	function getSkillDetail($skillId)
	{
		$skill = Skill::find($skillId);
		$result = null;
		$name_champion = $skill->champions->name;
		$data = $this->callApi($name_champion);

		foreach($data->$name_champion->spells as $spell)
		{
			// var_dump($one_data->name, $summoner_spell->name);
			// var_dump($this->similarity($one_data->name, $summoner_spell->name));
			// die();

			if($spell->name == $skill->name)
				$result = $spell;
		}

		return response()->view('pages.detail_skill', [
			'title' => $skill->name, 
			'idCss' => 'detailItem',
			'info_skill' => $result
		]);
	}
}
