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

    <script src="{{ asset('js/commun.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles --> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet"/>
     <!-- FilePond -->
    <link href="{{ asset('css/filepond-plugin-image-preview.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/filepond.min.css') }}" rel="stylesheet">
 <style>

    </style>
    @yield('contenetCss')
</head>
<body>
        @include('telephone.layouts.partials.Header')
        
            <!-- Content -->
                <div>
                    @yield('content')
                </div>
            <!-- content -->
   <br><br>
   @if(request()->route()->getName()==='showphone')        
   @include('telephone.layouts.partials.Footer')
   @endif
   
            <!-- FilePond Js -->
            <script src="{{ asset('js/filepond-plugin-file-validate-type.min.js') }}"></script>
            <script src="{{ asset('js/filepond-plugin-image-preview.min.js') }}"></script>
            <script src="{{ asset('js/filepond-plugin-file-encode.js') }}"></script>
            <script src="{{ asset('js/filepond.min.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('contentJs')

</body>
</html>
