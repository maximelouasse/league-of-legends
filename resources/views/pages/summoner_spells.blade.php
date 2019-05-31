@extends('layouts.default')

@section('content')
	<h1>Liste des summoner spells</h1>
	<a href="/summoner_spells/add" class="button_creation">+ Nouveau</a>

	<section>
		<ul>
			@foreach ($list_summoner_spells as $summoner_spell)
				<li>
					<list-summoner-spells :summoner_spell="{{ $summoner_spell }}"></list-summoner-spells>
				</li>
			@endforeach
		</ul>
	</section>

	<ul class="pagination">
        <li class="{{ ($list_summoner_spells->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $list_summoner_spells->url($list_summoner_spells->currentPage()-1) }}"><</a>
        </li>
        @for ($i = 1; $i <= $list_summoner_spells->lastPage(); $i++)
            <li class="{{ ($list_summoner_spells->currentPage() == $i) ? ' active' : '' }}">
                <a href="{{ $list_summoner_spells->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="{{ ($list_summoner_spells->currentPage() == $list_summoner_spells->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $list_summoner_spells->url($list_summoner_spells->currentPage()+1) }}" >></a>
        </li>
    </ul>
@stop

@section('specificscripts')
    <script src="{{ mix('js/summoner_spells.js') }}" defer></script>
@stop