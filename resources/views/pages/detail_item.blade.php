@extends('layouts.default')

@section('content')	
	<a class="retour" href="{{ url('items') }}">< Retour aux items</a>

	<h1>{{ $info_item->name }}</h1>
	<section>
		<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/item/1001.png" alt="">
		<p>{!! $info_item->description !!}</p>
	</section>
@stop