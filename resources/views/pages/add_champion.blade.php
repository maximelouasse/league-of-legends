@extends('layouts.default')

@section('content')
	<h1>Ajouter un champion</h1>
	<form action="{{ url('/champions/store') }}" method="POST" @submit.prevent="onSubmit(event)">
		<div class="form-group">
			<label>Nom</label>
			<input type="text" name="name">
			<input type="hidden" name="edit" value="false">
		</div>

		<label>Items</label>
		<div class="form-group">
		@for ($i = 0; $i < 6; $i++)
			<select id="item_{{ $i }}" name="item_{{ $i }}">
				@foreach ($list_items as $item)
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endforeach
			</select>
		@endfor
		</div>

		<label>Summoner spells</label>
		<div class="form-group">
		@for ($i = 0; $i < 2; $i++)
			<select id="summoner_spell_{{ $i }}" name="summoner_spell_{{ $i }}">
				@foreach ($list_summoner_spells as $summoner_spell)
					<option value="{{ $summoner_spell->id }}">{{ $summoner_spell->name }}</option>
				@endforeach
			</select>
		@endfor
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
    <script src="{{ mix('js/app.js') }}" defer></script>
@stop