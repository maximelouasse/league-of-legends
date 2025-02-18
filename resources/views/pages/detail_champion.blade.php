@extends('layouts.default')

@section('content')	
	<div class="backgroundChampion">
		<img src="http://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{ $avatar_url }}" alt="">
	</div>

	<a class="retour" href="{{ url('champions') }}">< Retour aux champions</a>

	<div class="infoHeader">
		<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/champion/{{ $info_champion->name }}.png" alt="">
		<h1>{{ $info_champion->name }} <br><span>{{ $info_champion->title }}</span></h1>
		<div>
			<button v-on:click="updateChampion({{ $id_champion }})"><img src="{{ asset('img/edit.png') }}" alt=""></button>
			<button v-on:click="deleteChampion({{ $id_champion }})"><img src="{{ asset('img/delete.png') }}" alt=""></button>
		</div>
	</div>

	<h3>Description</h3>
	
	<p class="description">{!! $info_champion->lore !!}</p>

	<h3>Skills</h3>

	<ul class="skills">
		@foreach ($info_champion->spells as $spell)
		<li><img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/{{ $spell->image->full }}" alt=""><div><span>{{ $spell->name }}</span><br>{!! $spell->description !!}</div></li>
		@endforeach
	</ul>

	<h3>Items</h3>

	<ul class="items">
		@foreach ($list_items as $item)
		<li>
			<a href="/items/{{ $item->key }}">
				<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/item/{{ $item->key }}.png" alt="">
				<p>{{ $item->name }}</p>
			</a>
		</li>
		@endforeach
	</ul>

	<h3>Summoner Spells</h3>

	<ul class="spells">
		@foreach ($list_summoner_spells as $summoner_spell)
		<li><img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/{{ $summoner_spell->key }}.png" alt=""><a href="/summoner_spells/{{ $summoner_spell->id }}">{{ $summoner_spell->name }}</a></li>
		@endforeach
	</ul>
@stop

@section('specificscripts')
    <script src="{{ mix('js/app.js') }}" defer></script>
@stop