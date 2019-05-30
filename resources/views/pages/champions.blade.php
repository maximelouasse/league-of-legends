@extends('layouts.default')

@section('content')
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