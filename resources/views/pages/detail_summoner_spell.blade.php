@extends('layouts.default')

@section('content')
	@if ($info_summoner_spell === null)
		<p>Ce summoner spell n'existe pas</p>
	@else
		<a class="retour" href="{{ url('summoner_spells') }}">< Retour aux summoners spells</a>

		<h1>{{ $info_summoner_spell->name }}</h1>
		<section>
			<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/{{ $info_summoner_spell->image->full }}" alt="">
			<p>{!! $info_summoner_spell->description !!}</p>
		</section>
	@endif
@stop

@section('specificscripts')
    <script src="{{ mix('js/summoner_spells.js') }}" defer></script>
@stop