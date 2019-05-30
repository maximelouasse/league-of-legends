<!doctype html>
<html>
    <head>
		@include('includes.head')
    </head>
    <body>
            @include('includes.header')
			
			<div id="app">
            	@yield('content')
			</div>

            @include('includes.footer')
		</div>
    </body>
</html>