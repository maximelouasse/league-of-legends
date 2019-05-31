@extends('layouts.default')

@section('content')
	<h1>Modifier le champion</h1>
	<form action="{{ url('/champions/store') }}" method="POST" @submit.prevent="onSubmit(event)">
		<div class="form-group">
			<label>Nom</label>
			<input type="text" name="name" value="{{ $info_champion->name }}">
			<input type="hidden" name="id" value="{{ $id_champion }}">
			<input type="hidden" name="edit" value="true">
		</div>

		@for ($i = 0; $i < 6; $i++)
			<select id="item_{{ $i }}" name="item_{{ $i }}">
				@foreach ($list_items as $item)
					@php
						if($items_champion[$i]->id == $item->id)
						{
							$selected = 'selected';
						}
						else
						{
							$selected = '';
						}
					@endphp

					<option value="{{ $item->id }}" {{ $selected }}>{{ $item->name }}</option>
				@endforeach
			</select>
		@endfor

		@for ($i = 0; $i < 2; $i++)
			<select id="summoner_spell_{{ $i }}" name="summoner_spell_{{ $i }}">
				@foreach ($list_summoner_spells as $summoner_spell)
					@php
						if($summoner_spells_champion[$i]->id == $summoner_spell->id)
						{
							$selected = 'selected';
						}
						else
						{
							$selected = '';
						}
					@endphp
					<option value="{{ $summoner_spell->id }}" {{ $selected }}>{{ $summoner_spell->name }}</option>
				@endforeach
			</select>
		@endfor

		<div class="form-group">
			<button type="submit" >Modifier</button>
		</div>
		<div>
			@{{ reponse_message }}
		</div>
    </form>
@stop

@section('specificscripts')
    <script src="{{ mix('js/app.js') }}" defer></script>
@stop