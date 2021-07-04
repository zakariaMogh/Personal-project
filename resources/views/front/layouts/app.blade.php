<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simple blog</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('assets/front/assets/favicon.ico')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('assets/front/css/styles.css')}}" rel="stylesheet" />
        @stack('css')
    </head>
    <body>
        <!-- Responsive navbar-->
        @include('front.layouts.partials.navbar')
        <!-- Page content-->
        @yield('content')
        <!-- Footer-->
        @include('front.layouts.partials.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('assets/front/js/scripts.js')}}"></script>
    @stack('js')
    </body>
</html>
