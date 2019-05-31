<!doctype html>
<html>
    <head>
		@include('includes.head')
	</head>

    <body id="{{ $idCss }}">
            @include('includes.header')
		    
            <main>
				<div id="app">
					@yield('content')
				</div>
            </main>

            @include('includes.footer')
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> -->
    </body>
</html>