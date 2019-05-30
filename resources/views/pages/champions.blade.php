@extends('layouts.default')

@section('content')
	<h1>Liste des champions</h1>
	<a href="/champions/add">Ajouter un champion</a>
	<ul>
		@foreach ($list_champions as $champion)
			<li>
				<list-champions :champion="{{ $champion }}"></list-champions>
			</li>
		@endforeach
		<!-- <li v-for="(champion, index) in champions">
			<list-champions :champion="champion" :key="index"/>
		</li> -->
	</ul>

	{{ $list_champions->render() }}
@stop

@section('specificscripts')
    <script src="{{ mix('js/app.js') }}" defer></script>
    <h1>Liste des champions</h1>
    <a href="" class="button_creation">+ Nouveau</a>

    <section>
        <div class="card" style="background-image:url({{ asset('img/aatrox.jpg') }})">
        <a href="{{ url('champions/Aatrox') }}">
            <span>Aatrox</span>
        </a>
        </div><!--
        --><div class="card" style="background-image:url({{ asset('img/aatrox.jpg') }})">
        </div><!--
        --><div class="card" style="background-image:url({{ asset('img/aatrox.jpg') }})">
        </div><!--
        --><div class="card" style="background-image:url({{ asset('img/aatrox.jpg') }})">
        </div><!--
        --><div class="card" style="background-image:url({{ asset('img/aatrox.jpg') }})">
        </div><!--
        --><div class="card" style="background-image:url({{ asset('img/aatrox.jpg') }})">
        </div>
    </section>
    
@stop