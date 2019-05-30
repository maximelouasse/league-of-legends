@extends('layouts.default')

@section('content')
	<h1>Liste des champions</h1>
	<a href="/champions/add">Ajouter un champion</a>
	<ul>
		@foreach ($list_champions as $champion)
			<li>
				<list-champions :champion="{{ $champion }}"></list-champions>
			</li>
		@endforeach
		<!-- <li v-for="(champion, index) in champions">
			<list-champions :champion="champion" :key="index"/>
		</li> -->
	</ul>

	{{ $list_champions->render() }}
@stop

@section('specificscripts')
    <script src="{{ mix('js/app.js') }}" defer></script>
@stop