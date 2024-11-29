<!DOCTYPE html>
<html lang="en">

<head>
    <title>DUCASEAN -Sales Management System Admin Dashboard Bootstrap HTML Template | DucAsean</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
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
    @yield('scripts')
</body>

</html>
