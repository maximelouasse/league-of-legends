<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Item;
use function GuzzleHttp\json_encode;

// http://ddragon.leagueoflegends.com/cdn/6.24.1/data/fr_FR/item.json

class ItemController extends Controller
{
	function callApi()
	{
		$client = new Client();
		$res = $client->request('GET', 'http://ddragon.leagueoflegends.com/cdn/6.24.1/data/fr_FR/item.json');
		$result = $res->getBody()->getContents();

		return json_decode($result)->data;
	}

	function getAllItems()
	{
		$items = Item::paginate(18);

		$pagination = [
			'pagination' => [
				'total' =>	$items->total(),
                'per_page' => $items->perPage(),
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'from' => $items->firstItem(),
                'to' => $items->lastItem()
            ]
		];
		
		return response()->view('pages.items', [
			'title' => 'Items',
			'idCss' => 'items',  
			'list_items' => $items, 
			'pagination' => $pagination
		]);
	}

	function getItemDetail($itemKey)
	{
		$data = $this->callApi();

		return response()->view('pages.detail_item', [
			'title' => $data->$itemKey->name,
			'idCss' => 'detailItem', 
			'info_item' => $data->$itemKey
		]);
	}
	
	function store(Request $request)
	{
		$itemExist = Item::where('name', '=', $request->name_item);

		if($itemExist->exists() === true)
		{
			return json_encode(['error' => true]);
		}
		else
		{
			// Validation
			/*$this->validate($request, [
				'name' => 'required|min:2'
			]);*/
			
			$client = new Client();
			$res = $client->request('GET', 'http://ddragon.leagueoflegends.com/cdn/6.24.1/data/fr_FR/item.json');
			$result = $res->getBody()->getContents();
			$data = json_decode($result)->data;

			foreach($data as $index => $item)
			{
				if($item->name == $request->name_item)
				{
					$key = $index;
				}
			}

			$item = new Item();
			$item->name = $request->name_item;
			$item->key = $key;
			$item->save();

			return $item;
		}
	}

	function update(Request $request)
	{
		return json_encode(Item::where('id', $request->id_item)->update(array('name' => $request->name_item)));
	}

	function delete($itemId)
	{
		$item = Item::find($itemId);

		if($item != null)
		{
			$item->delete();
		}
		
		return redirect('/items');
	}
}
