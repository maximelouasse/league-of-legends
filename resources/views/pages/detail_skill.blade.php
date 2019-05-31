@extends('layouts.default')

@section('content')
	<a class="retour" href="{{ url('skills') }}">< Retour aux skills</a>

	<h1>{{ $info_skill->name }}</h1>
	<section>
		<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/TaricQ.png" alt="">
		<p>{!! $info_skill->description !!}</p>
	</section>
@stop

@section('specificscripts')
    <script src="{{ mix('js/skills.js') }}" defer></script>
@stop