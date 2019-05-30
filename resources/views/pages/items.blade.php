@extends('layouts.default')

@section('content')
	<h1>Liste des objets</h1>
	<a href="/items/add">Ajouter un objet</a>
	<ul>
		@foreach ($list_items as $item)
			<li>
				<list-items :item="{{ $item }}"></list-items>
			</li>
		@endforeach
	</ul>

	{{ $list_items->render() }}
@stop

@section('specificscripts')
    <script src="{{ mix('js/items.js') }}" defer></script>
@stop