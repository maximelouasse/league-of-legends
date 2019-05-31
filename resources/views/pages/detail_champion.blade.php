@extends('layouts.default')

@section('content')	
	<a class="retour" href="{{ url('champions') }}">< Retour aux champions</a>

	<div class="infoHeader">
		<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/champion/{{ $info_champion->name }}.png" alt="">
		<div>
			<h1>{{ $info_champion->name }} - <span>{{ $info_champion->title }}</span></h1>
		</div>
	</div>

	<h3>Description</h3>
	
	<p class="description">{!! $info_champion->lore !!}</p>

	@foreach ($list_items as $item)
        <li>{{ $item->name }}</li>
	@endforeach

	@foreach ($list_summoner_spells as $spell)
        <li>{{ $spell->name }}</li>
	@endforeach
	<h3>Skills</h3>

	<ul class="spells">
		@foreach ($info_champion->spells as $spell)
		<li><img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/{{ $spell->image->full }}" alt=""><span>{{ $spell->name }}</span><br>{!! $spell->description !!}</li>
		@endforeach
	</ul>

	<h3>Items</h3>

	<ul class="items">
		@foreach ($list_items as $item)
		<li><img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/item/{{ $item->key }}.png" alt=""><a href="/items/{{ $item->key }}">{{ $item->name }}</a><br>{!! $item->description !!}</li>
		@endforeach
	</ul>

	<h3>Summoner Spells</h3>

	<ul class="spells">
		@foreach ($list_summoner_spells as $summoner_spell)
		<li><img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/{{ $summoner_spell->key }}.png" alt=""><a href="/summoner_spells/{{ $summoner_spell->id }}">{{ $summoner_spell->name }}</a></li>
		@endforeach
	</ul>
@stop