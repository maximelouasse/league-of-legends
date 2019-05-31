@extends('layouts.default')

@section('content')
	<h1>Liste des champions</h1>
	<a href="/champions/add" class="button_creation">+ Nouveau</a>
	<section>
		@foreach ($list_champions as $champion)
			<list-champions :champion="{{ $champion }}"></list-champions>
		@endforeach
	</section>

	{{ $list_champions->render() }}
@stop

@section('specificscripts')
    <script src="{{ mix('js/app.js') }}" defer></script>    
@stop