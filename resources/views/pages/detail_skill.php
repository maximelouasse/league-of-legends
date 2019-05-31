@extends('layouts.default')

@section('content')
	{{ $skill }}
@stop

@section('specificscripts')
    <script src="{{ mix('js/skills.js') }}" defer></script>
@stop