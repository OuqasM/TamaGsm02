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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet"/>

    <!-- nabar style-->
    <style>
        
          
            nav{
                display: flex;
                justify-content: space-between;
                margin: 10% auto;
                width: 90%;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 4px;
                
            }
           
            nav ul li{
                display: inline-block;
                list-style: none;
                margin: 0 10px;
            }
            nav ul li a{
                text-decoration: none;
                color:rgba(0, 0, 0, 0.993);
                position: relative;
                display: inline-block;
            }
            nav a::before{
                content: attr(data-text);
                color:rgb(0, 0, 0);
                position: absolute;
                left: 0;
                top: 0%;
                width: 0%;
                white-space: nowrap;
                overflow: hidden;
                transition: .5s;
                border-bottom: 3px solid orange;

            }
            a:hover{
                color:rgba(255, 255, 255, .5);

                text-decoration: none;
            }
            a:hover::before{
                width: 100%;
            }
            @media(max-width:700px){
                nav{
                    display: block;
                    text-align: center;
                }
                nav ul li{
                    display: block;
                    padding: 10px 0;
                }
            }


    </style>
    <style>
            .bloc_left_price {
                color: #c01508;
                text-align: center;
                font-weight: bold;
                font-size: 150%;
            }
            .category_block li:hover {
                background-color: #007bff;
            }
            .category_block li:hover a {
                color: #ffffff;
            }
            .category_block li a {
                color: #343a40;
            }
      
            .product_rassurance {
                padding: 10px;
                margin-top: 15px;
                background: #ffffff;
                border: 1px solid #6c757d;
                color: #6c757d;
            }
          
            .product_rassurance .list-inline li:hover {
                color: #343a40;
            }
            .reviews_product .fa-star {
                color: gold;
            }
            .pagination {
                margin-top: 10px;
            }
            footer {
                background: #343a40;
                padding: 20px;
                margin-bottom: 0px;
            }
            footer a {
                color: #f8f9fa!important;
            }
            .face , .in , .nbr {
                width:33px;
                height:33px;
                margin: 0 auto;
                display:inline-block;
            }
            .face a{
                height: 33px;
                width: 33px;
                background-image: url('images/facebook-logo.png');
                background-repeat: no-repeat;
                display:block;
            }
           
            body {
                padding-top: 85px;
                background-image: url('images/brown.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                display:block;
                background-size: cover;
                }
            #myBtn {
            display: none; /* Hidden by default */
            position: fixed; /* Fixed/sticky position */
            bottom: 20px; /* Place the button at the bottom of the page */
            right: 30px; /* Place the button 30px from the right */
            z-index: 99; /* Make sure it does not overlap */
            border: none; /* Remove borders */
            outline: none; /* Remove outline */
            background-color: rgb(207, 163, 163); /* Set a background color */
            color: white; /* Text color */
            cursor: pointer; /* Add a mouse pointer on hover */
            padding: 15px; /* Some padding */
            border-radius: 50px; /* Rounded corners */
            font-size: 18px; /* Increase font size */
            }
            #myBtn:hover {
            background-color: #555; /* Add a dark-grey background on hover */
            }
    </style>
    @yield('contentCss')
     </head>
<body>
    <div id="">
      @include('layouts.partials.navbar')
      <div class="">
            <!-- Content -->
            <div id="wrap">
                <div id="main" class="container clear-top">
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
<script>
        var mybutton = document.getElementById("myBtn");
        mybutton.innerHTML = '<i class="fas fa-chevron-circle-up"></i>';
        
        
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
</script>
</body>
</html>
