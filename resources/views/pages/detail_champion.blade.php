@extends('layouts.default')

@section('content')
	<h1>{{ $info_champion->name }} - {{ $info_champion->title }}</h1>
	<img src="http://ddragon.leagueoflegends.com/cdn/img/champion/splash/{{ $avatar_url }}" alt="">
	<p>{!! $info_champion->lore !!}</p>


	@foreach ($info_champion->spells as $spell)
        <li>{{ $spell->name }} : {!! $spell->description !!}<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/{{ $spell->image->full }}" alt=""></li>
	@endforeach

	@foreach ($list_items as $item)
        <li>{{ $item->name }}</li>
	@endforeach
@stop