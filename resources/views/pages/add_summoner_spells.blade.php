@extends('layouts.default')

@section('content')
	<h1>Ajouter un suommoner spell</h1>
	<form action="{{ url('/suommoner_spells/store') }}" method="POST" @submit.prevent="onSubmit(event)">
		<div class="form-group">
			<label>Nom</label>
			<input type="text" name="name">
			<input type="text" name="edit" value="false">
		</div>
		<div class="form-group">
			<button type="submit" >Ajouter</button>
		</div>
		<div>
			@{{ reponse_message }}
		</div>
    </form>
@stop

@section('specificscripts')
    <script src="{{ mix('js/summoner_spells.js') }}" defer></script>
@stop