@extends('layouts.default')

@section('content')
	<h1>Liste des objets</h1>
	<a href="/items/add" class="button_creation">+ Nouveau</a>
	<section>
		<ul>
			@foreach ($list_items as $item)
				<list-items :item="{{ $item }}"></list-items>
			@endforeach
		</ul>

		<!-- TEMPLATE ITEM A SUPPRIMER -->
		<!-- <ul>
			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/item/1001.png" alt="">
					<p>Botte</p>
				</a>
				<button><img src="{{ asset('img/edit.png') }}" alt=""></button>
				<button><img src="{{ asset('img/delete.png') }}" alt=""></button>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/item/1001.png" alt="">
					<p>Botte</p>
				</a>
				<button><img src="{{ asset('img/edit.png') }}" alt=""></button>
				<button><img src="{{ asset('img/delete.png') }}" alt=""></button>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/item/1001.png" alt="">
					<p>Botte</p>
				</a>
				<button><img src="{{ asset('img/edit.png') }}" alt=""></button>
				<button><img src="{{ asset('img/delete.png') }}" alt=""></button>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/item/1001.png" alt="">
					<p>Botte</p>
				</a>
				<button><img src="{{ asset('img/edit.png') }}" alt=""></button>
				<button><img src="{{ asset('img/delete.png') }}" alt=""></button>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/item/1001.png" alt="">
					<p>Botte</p>
				</a>
				<button><img src="{{ asset('img/edit.png') }}" alt=""></button>
				<button><img src="{{ asset('img/delete.png') }}" alt=""></button>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/item/1001.png" alt="">
					<p>Botte</p>
				</a>
				<button><img src="{{ asset('img/edit.png') }}" alt=""></button>
				<button><img src="{{ asset('img/delete.png') }}" alt=""></button>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/item/1001.png" alt="">
					<p>Botte</p>
				</a>
				<button><img src="{{ asset('img/edit.png') }}" alt=""></button>
				<button><img src="{{ asset('img/delete.png') }}" alt=""></button>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/item/1001.png" alt="">
					<p>Botte</p>
				</a>
				<button><img src="{{ asset('img/edit.png') }}" alt=""></button>
				<button><img src="{{ asset('img/delete.png') }}" alt=""></button>
			</li>

			<li>
				<a href="">
					<img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/item/1001.png" alt="">
					<p>Botte</p>
				</a>
				<button><img src="{{ asset('img/edit.png') }}" alt=""></button>
				<button><img src="{{ asset('img/delete.png') }}" alt=""></button>
			</li>
		</ul> -->
		<!-- TEMPLATE ITEM A SUPPRIMER -->
	</section>

	<ul class="pagination">
        <li class="{{ ($list_items->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $list_items->url($list_items->currentPage()-1) }}"><</a>
        </li>
        @for ($i = 1; $i <= $list_items->lastPage(); $i++)
            <li class="{{ ($list_items->currentPage() == $i) ? ' active' : '' }}">
                <a href="{{ $list_items->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="{{ ($list_items->currentPage() == $list_items->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $list_items->url($list_items->currentPage()+1) }}" >></a>
        </li>
    </ul>
@stop

@section('specificscripts')
    <script src="{{ mix('js/items.js') }}" defer></script>
@stop