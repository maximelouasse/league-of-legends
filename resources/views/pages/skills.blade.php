@extends('layouts.default')

@section('content')
	<h1>Liste des skills</h1>

	<section>
		<ul>
			@foreach ($list_skills as $skill)
				<list-skills :skill="{{ $skill }}" :champion="{{ $skill->champions }}"></list-skills>
			@endforeach
		</ul>

        <!-- TEMPLATE SKILLS A SUPPRIMER -->
		<!-- <ul>
			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/TaricQ.png" alt="">
					<p>Bénédiction stellaire</p>
				</a>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/TaricQ.png" alt="">
					<p>Bénédiction stellaire</p>
				</a>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/TaricQ.png" alt="">
					<p>Bénédiction stellaire</p>
				</a>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/TaricQ.png" alt="">
					<p>Bénédiction stellaire</p>
				</a>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/TaricQ.png" alt="">
					<p>Bénédiction stellaire</p>
				</a>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/TaricQ.png" alt="">
					<p>Bénédiction stellaire</p>
				</a>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/TaricQ.png" alt="">
					<p>Bénédiction stellaire</p>
				</a>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/TaricQ.png" alt="">
					<p>Bénédiction stellaire</p>
				</a>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/spell/TaricQ.png" alt="">
					<p>Bénédiction stellaire</p>
				</a>
			</li>
        </ul> -->
        <!-- TEMPLATE SKILLS A SUPPRIMER -->
	</section>

	<ul class="pagination">
        <li class="{{ ($list_skills->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $list_skills->url($list_skills->currentPage()-1) }}"><</a>
        </li>
        @for ($i = 1; $i <= $list_skills->lastPage(); $i++)
            <li class="{{ ($list_skills->currentPage() == $i) ? ' active' : '' }}">
                <a href="{{ $list_skills->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="{{ ($list_skills->currentPage() == $list_skills->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $list_skills->url($list_skills->currentPage()+1) }}" >></a>
        </li>
    </ul>
@stop

@section('specificscripts')
    <script src="{{ mix('js/skills.js') }}" defer></script>
@stop