<header>
	<a href="{{ url('/') }}">
    	<img src="{{ asset('img/lol-logo.png') }}" alt="">
	</a>

	<nav>
        <ul>
            <!-- <li class="{{ Request::path() == '/' ? 'active' : '' }}">
                <a href="{{ url('/') }}">Accueil</a>
            </li> -->
            <li class="{{ Request::path() == 'champions' ? 'active' : '' }}">
                <a href="{{ url('champions') }}">Champions</a>
            </li>
            <li class="{{ Request::path() == 'items' ? 'active' : '' }}">
                <a href="{{ url('items') }}">Items</a>
			</li>
			<li class="{{ Request::path() == 'summoner_spells' ? 'active' : '' }}">
                <a href="{{ url('summoner_spells') }}">Summoner Spells</a>
			</li>
			<li class="{{ Request::path() == 'skills' ? 'active' : '' }}">
                <a href="{{ url('skills') }}">skills</a>
            </li>
        </ul>
    </nav>
</header>