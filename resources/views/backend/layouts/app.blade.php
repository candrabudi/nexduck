@php
    use App\Models\Setting;

    $setting = Setting::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | {{ $setting->web_name }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('backoffice/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backoffice/vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('backoffice/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Style css -->
    <link class="main-css" href="{{ asset('backoffice/css/style.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <div id="main-wrapper">
        @include('backend.layouts.nav_header')

        @include('backend.layouts.header')

        @include('backend.layouts.deznav')
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <div class="footer out-footer">
            <div class="copyright">
                <p>Copyright © Developed by <a href="https://DucAsean.com/" target="_blank">DucAsean</a> <span
                        class="current-year">2024</span></p>
            </div>
        </div>
    </div>
    <script src="{{ asset('backoffice/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/chart-js/chart.bundle.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('backoffice/vendor/peity/jquery.peity.min.js') }}"></script>

    <script src="{{ asset('backoffice/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/datatables/js/jszip.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/plugins-init/datatables.init.js') }}"></script>

    <script src="{{ asset('backoffice/js/custom.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/deznav-init.js') }}"></script>
    <script src="{{ asset('backoffice/js/demo.js') }}"></script>
    <script src="{{ asset('backoffice/js/styleSwitcher.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
</body>

</html>
