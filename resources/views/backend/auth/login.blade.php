<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <title>{{ App\Helpers\SettingsHelper::getSetting()->web_name }}</p></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="{{ asset('backoffice/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link class="main-css" href="{{ asset('backoffice/css/style.css') }}" rel="stylesheet">

</head>

<body style="background-image:url('{{ asset('backoffice/images/bg.png') }}'); background-position:center;">
    <div class="authincation fix-wrapper">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html">
                                            <img src="{{ asset(App\Helpers\SettingsHelper::getSetting()->web_logo ) }}" alt="">
                                        </a>                                        
                                    </div>
                                    <h4 class="text-center mb-4">Masuk Untuk Mengelola Data</h4>
                                    <form action="{{ route('backoffice.authenticate') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1 form-label">Username</label>
                                            <input type="text" class="form-control" name="username" placeholder="username">
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="dz-password">Password</label>
                                            <input type="password" id="dz-password" name="password" class="form-control" value="">
                                            <span class="show-pass eye">
                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('backoffice/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/deznav-init.js') }}"></script>
    <script src="{{ asset('backoffice/js/custom.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/demo.js') }}"></script>
</body>

</html>
