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
	
	@if ($list_champions->lastPage() > 1)
	<ul class="pagination">
		<li class="{{ ($list_champions->currentPage() == 1) ? ' disabled' : '' }}">
			<a href="{{ $list_champions->url(1) }}">Previous</a>
		</li>
		@for ($i = 1; $i <= $list_champions->lastPage(); $i++)
			<li class="{{ ($list_champions->currentPage() == $i) ? ' active' : '' }}">
				<a href="{{ $list_champions->url($i) }}">{{ $i }}</a>
			</li>
		@endfor
		<li class="{{ ($list_champions->currentPage() == $list_champions->lastPage()) ? ' disabled' : '' }}">
			<a href="{{ $list_champions->url($list_champions->currentPage()+1) }}" >Next</a>
		</li>
	</ul>
	@endif
@stop

@section('specificscripts')
    <script src="{{ mix('js/app.js') }}" defer></script>    
@stop