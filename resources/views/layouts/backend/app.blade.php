<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        @stack('css')

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body class="font-sans antialiased">
        @include('layouts.backend.partials._topbar')

        <div class="page-wrapper">
            @include('layouts.backend.partials._left_side_nav')

            <!-- Page Content-->
            <div class="page-content">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">

                            @yield('content')
                            
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->


                </div><!-- container -->

                <footer class="footer text-center text-sm-left">
                    &copy; 2021 Stekos <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Stekos</span>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>

        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/waves.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

        @stack('js')

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
    </body>
</html>
