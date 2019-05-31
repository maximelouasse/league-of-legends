@extends('layouts.default')

@section('content')
	<h1>Ajouter un champion</h1>
	<form action="{{ url('/champions/store') }}" method="POST" @submit.prevent="onSubmit(event)">
		<div class="form-group">
			<label>Nom</label>
			<input type="text" name="name">
			<input type="hidden" name="edit" value="false">
		</div>

		<div>
			@{{ reponse_message }}
		</div>

		@for ($i = 0; $i < 6; $i++)
			<select id="item_{{ $i }}" name="item_{{ $i }}">
				@foreach ($list_items as $item)
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endforeach
			</select>
		@endfor

		<div class="form-group">
			<button type="submit" >Ajouter</button>
		</div>
    </form>
@stop

@section('specificscripts')
    <script src="{{ mix('js/app.js') }}" defer></script>
@stop