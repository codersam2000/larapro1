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
        <!-- ck editoer  -->
        <script src="{{ asset('assets/ckeditor/ckeditor.js')}}"></script>
        <script src="{{ asset('assets/ckfinder/ckfinder.js') }}"></script>
        
    </head>
    <body>
        <!-- Responsive navbar-->
            @include('admin.components.widgets.header')
        <!-- Page content-->
        <div class="container mt-5">
            
                    <!--content-->
                   @yield('content')
                
        </div>
        <!-- Footer-->
        @include('admin.components.widgets.footer')
        <!-- Bootstrap core JS-->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/frontend/vendor/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/fontawesome/js/all.js') }}"></script>
    </body>
</html>
