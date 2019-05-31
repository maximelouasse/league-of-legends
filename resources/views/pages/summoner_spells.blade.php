@extends('layouts.default')

@section('content')
	<h1>Liste des summoner spells</h1>
	<a href="/summoner_spells/add">Ajouter un summoner spell</a>
	<ul>
		@foreach ($list_summoner_spells as $summoner_spell)
			<li>
				<list-summoner-spells :summoner_spell="{{ $summoner_spell }}"></list-summoner-spells>
			</li>
		@endforeach
	</ul>

	{{ $list_summoner_spells->render() }}
@stop

@section('specificscripts')
    <script src="{{ mix('js/summoner_spells.js') }}" defer></script>
@stop