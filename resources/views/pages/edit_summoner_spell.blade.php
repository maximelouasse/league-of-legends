@extends('layouts.default')

@section('content')
	<h1>Modifier le summoner</h1>
	<form action="{{ url('/summoner_spells/store') }}" method="POST" @submit.prevent="onSubmit(event)">
		<div class="form-group">
			<label>Nom</label>
			<input type="text" name="name" value="{{ $info_summoner_spell->name }}">
			<input type="text" name="id" value="{{ $id_summoner_spell }}">
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
    <script src="{{ mix('js/summoner_spells.js') }}" defer></script>
@stop