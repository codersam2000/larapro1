<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>
        @yield('title')
        </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/frontend/vendor/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet" />
        <script src="{{ asset('assets/frontend/vendor/js/jquery.v3.6.0.min.js') }}"></script>
    </head>
    <body>
        <!-- Responsive navbar-->
            @include('frontend.components.widgets.header')
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                   @yield('content')
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                   @include('frontend.components.widgets.right-sitebar')
                </div>
            </div>
        </div>
        <!-- Footer-->
        @include('frontend.components.widgets.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/frontend/vendor/js/script.js') }}"></script>
        <script src="{{ asset('assets/fontawesome/js/all.js') }}"></script>
        
    </body>
</html>
