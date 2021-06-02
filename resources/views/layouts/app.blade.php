<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/commusn.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/commun.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet"/>

    <!-- nabar style-->
   
    @yield('contentCss')
     </head>
<body>
    @include('layouts.partials.navbar')
    <div id="">
      <div class="">
            <!-- Content -->
            <div id="wrap">
                <div id="main" class=" clear-top">
                       @yield('content')
                </div>
            </div>
            <!-- content -->
        </div>
    </div>
    @if (request()->route()->getName() === 'index')        
    @include('layouts.partials.Footer')
    @endif
    @yield('contentJs')
    <script>
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {myFunction()};
        // Get the navbar
        var navbar = document.getElementById("navbarr");
        // Get the offset position of the navbar
        var sticky = navbar.offsetTop;
        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
        }
</script>
</body>
</html>
