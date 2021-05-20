<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
    <style>

            body{
                padding-top: 85px;
                background-image: url('http://127.0.0.1:8000/images/brown.jpg');
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
  
        
        
        .reviews_product .fa-star {
            color: gold;
        }
        .pagination {
            margin-top: 10px;
        }
        footer {
            background: #343a40;
            padding: 20px;
        }
        footer a {
            color: #f8f9fa!important
        }

        #navbarr {
        overflow: hidden;
        background-color: #333;
        }
        
        /* The sticky class is added to the navbar with JS when it reaches its scroll position */
        .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        } 
    </style>
    @yield('contenetCss')
</head>
<body>
        @include('telephone.layouts.partials.Header')
        
            <!-- Content -->
                <div class="container">
                    @yield('content')
                </div>
            <!-- content -->
   <br><br>
    @include('telephone.layouts.partials.Footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    var mybutton = document.getElementById("myBtn");
    mybutton.innerHTML = '<i class="fas fa-chevron-circle-up"></i>';
    
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
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>
@yield('contentJs')

</body>
</html>
