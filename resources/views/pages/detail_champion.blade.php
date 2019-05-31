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
			<a href=""><img src="{{ asset('img/edit.png') }}" alt=""></a>
			<a href=""><img src="{{ asset('img/delete.png') }}" alt=""></a>
		</div>
	</div>

	<h3>Description</h3>
	
	<p class="description">{!! $info_champion->lore !!}</p>

	<h3>Skills</h3>

	<ul class="spells">
		@foreach ($info_champion->spells as $spell)
		<li><img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/{{ $spell->image->full }}" alt=""><span>{{ $spell->name }}</span><br>{!! $spell->description !!}</li>
		@endforeach
	</ul>

	<h3>Items</h3>

	<ul class="items">
		@foreach ($list_items as $item)
		<li>{{ $item->name }}</li>
		@endforeach
	</ul>
@stop