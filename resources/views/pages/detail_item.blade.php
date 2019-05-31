@extends('layouts.default')

@section('content')
	<h1>{{ $info_item->name }}</h1>
	<p>{!! $info_item->description !!}</p>
@stop