@extends('layouts.default')

@section('content')
	<h1>Modifier l'objet</h1>
	<form action="{{ url('/items/store') }}" method="POST" @submit.prevent="onSubmit(event)">
		<div class="form-group">
			<label>Nom</label>
			<input type="text" name="name">
			<input type="text" name="id" value="{{ $id_item }}">
			<input type="text" name="edit" value="true">
		</div>
		<div class="form-group">
			<button type="submit" >Modifier</button>
		</div>
		<div>
			@{{ reponse_message }}
		</div>
    </form>
@stop

@section('specificscripts')
    <script src="{{ mix('js/items.js') }}" defer></script>
@stop