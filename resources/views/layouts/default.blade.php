<!doctype html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body id="{{ $title }}">
            @include('includes.header')
            
            <main>
            @yield('content')
            </main>

            @include('includes.footer')
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> -->
    </body>
</html>