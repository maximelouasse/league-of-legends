@extends('layouts.default')

@section('content')
	<h1>Liste des skills</h1>
	<ul>
		@foreach ($list_skills as $skill)
			<li>
				<list-skills :skill="{{ $skill }}" :champion="{{ $skill->champions }}"></list-skills>
			</li>
		@endforeach
	</ul>
	{{ $list_skills->render() }}
@stop

@section('specificscripts')
    <script src="{{ mix('js/skills.js') }}" defer></script>
@stop