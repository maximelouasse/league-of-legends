@extends('layouts.default')

@section('content')
	<h1>{{ $info_skill->name }}</h1>
	<p>{{ $info_skill->description }}</p>
@stop

@section('specificscripts')
    <script src="{{ mix('js/skills.js') }}" defer></script>
@stop