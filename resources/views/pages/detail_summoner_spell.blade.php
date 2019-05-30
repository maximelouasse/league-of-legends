@extends('layouts.default')

@section('content')
	@if ($info_summoner_spell === null)
		<p>Ce summoner n'existe pas</p>
	@else
		<h1>{{ $info_summoner_spell->name }}</h1>
		<p>{{ $info_summoner_spell->description }}</p>
	@endif
@stop

@section('specificscripts')
    <script src="{{ mix('js/summoner_spells.js') }}" defer></script>
@stop