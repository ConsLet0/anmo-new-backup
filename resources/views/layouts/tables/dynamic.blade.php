<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Pelanggan</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/e0e5d17da7.js" crossorigin="anonymous"></script>
    {{-- Datatable CSS --}}
    <link rel="stylesheet" href="{{ asset('datatable/dataTables.bootstrap4.min.css') }}">
    {{-- Dynamic CSS --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/dynamic.css') }}">
    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.min.css') }}">
    {{-- Toastr --}}
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    {{-- Library Jquery Select2 CSS --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    {{ Font Quicksand }}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container" style="margin-bottom: 100px;">
        <div class="header mt-5 text-center mb-4">
            <h2 class="text-uppercase font-weight-bold">
                @yield('pageTitle')
            </h2>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>

    <footer id="footer">
        <!--Footer-->
        @yield('tabsMenu')
    </footer>
    <!--/Footer-->

    <script src="{{ asset('jquery/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    {{-- Datatable JS --}}
    <script src="{{ asset('datatable/jquery.dataTables.min.js') }}"></script>
    <script src="//cdn.datatables.net/plug-ins/1.11.4/api/fnReloadAjax.js"></script>
    <script src="{{ asset('datatable/dataTables.bootstrap4.min.js') }}"></script>
    {{-- SweetAlert --}}
    <script src="{{ asset('sweetalert/sweetalert2.min.js') }}"></script>
    {{-- Toastr --}}
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    {{-- Library Jquery Select2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    @yield('footer-scripts')
</body>

</html>
