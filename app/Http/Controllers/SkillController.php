<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Skill;

class SkillController extends Controller
{
	function getAllSkills()
	{
		$skills = Skill::paginate(5);

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

		return response()->view('pages.skills', ['list_skills' => $skills,'pagination' => $pagination]);
	}
	
	function getSkillDetail($skillId)
	{
		$skill = Skill::find($skillId);
		$result = null;
		// $data = $this->callApi();

		// foreach($data as $one_data)
		// {
		// 	// var_dump($one_data->name, $summoner_spell->name);
		// 	// var_dump($this->similarity($one_data->name, $summoner_spell->name));
		// 	// die();

		// 	if($one_data->name == $skill->name)
		// 		$result = $one_data;
		// }

		var_dump($skill);
		die();

		return response()->view('pages.detail_skill', ['info_skill' => $result]);
	}
}
