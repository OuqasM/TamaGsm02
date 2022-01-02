<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('newassets/css/vendors.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.css">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('newassets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('newassets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('newassets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('newassets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('newassets/css/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('newassets/css/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('newassets/css/jquery.bootstrap-touchspin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('newassets/css/swiper.min.css') }}">
     <!-- DataTables -->
     <link href="{{ asset('css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('newassets/css/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('newassets/css/boxicons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('newassets/css/dashboard-ecommerce.css') }}">
    <!-- END: Page CSS-->
    <!-- FilePond -->
    <link href="{{ asset('css/filepond-plugin-image-preview.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/filepond.min.css') }}" rel="stylesheet">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('newassets/css/style.css') }}">
    <!-- END: Custom CSS-->
    <style>
        .text-small {
        font-size: 0.9rem;
        }

        footer a {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s;
        }

        footer a:hover, footer a:focus {
        text-decoration: none;
        }

        footer .form-control {
        background: #212529;
        border-color: #545454;
        }

        footer .form-control:focus {
        background: #212529;
        }

        footer {
        background: #212529;
        }
    </style>
    @yield('Css')
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
    @if (request()->route()->getName() === 'showallservices')
    @include('layouts.partials.Footer')
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('newassets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('newassets/js/LivIconsEvo.tools.js') }}"></script>
    <script src="{{ asset('newassets/js/LivIconsEvo.defaults.js') }}"></script>
    <script src="{{ asset('newassets/js/LivIconsEvo.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    {{-- <script src="{{ asset('newassets/js/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('newassets/js/swiper.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('newassets/js/horizontal-menu.js') }}"></script>
    <script src="{{ asset('newassets/js/app-menu.js') }}"></script>
    <script src="{{ asset('newassets/js/app.js') }}"></script>
    <script src="{{ asset('newassets/js/components.js') }}"></script>
    <script src="{{ asset('newassets/js/footer.min.js') }}"></script>
    <script src="{{ asset('newassets/js/jquery.bootstrap-touchspin.js') }}"></script>
    <!-- END: Theme JS-->
    <!-- Datatable Assets -->
    <script src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.init.js') }}"></script>
    <!-- FilePond Js -->
    <script src="{{ asset('js/filepond-plugin-file-encode.js') }}"></script>
    <script src="{{ asset('js/filepond-plugin-file-validate-type.min.js') }}"></script>
    <script src="{{ asset('js/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('js/filepond.min.js') }}"></script>
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('newassets/js/dashboard-ecommerce.js') }}"></script>
    {{-- <script src="{{ asset('newassets/js/chart-apex.min.js') }}"></script> --}}
    <script src="{{ asset('newassets/js/number-input.js') }}"></script>

@yield('Js')
</body>
</html>
