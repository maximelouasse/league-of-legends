@extends('layouts.default', ['title' => $title])

@section('content')
	<div class="overlay">

	</div>
@stop

@section('specificscripts')
    <script src="{{ mix('js/app.js') }}" defer></script>
@stop