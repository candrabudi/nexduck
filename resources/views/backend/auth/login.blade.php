
<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/minible/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Nov 2024 07:26:57 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Login | Minible - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backoffice/assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('backoffice/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backoffice/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backoffice/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="index.html" class="mb-5 d-block auth-logo">
                                <img src="{{ asset('backoffice/assets/images/logo-dark.png') }}" alt="" height="22" class="logo logo-dark">
                                <img src="{{ asset('backoffice/assets/images/logo-light.png') }}" alt="" height="22" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back!</h5>
                                    <p class="text-muted">Sign in to continue to Minible.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{ route('backoffice.authenticate', ['a' => $token]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                        
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                                        </div>
                        
                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                        </div>
                        
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> Minible. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>

        <script src="{{ asset('backoffice/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backoffice/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backoffice/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backoffice/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backoffice/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('backoffice/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('backoffice/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    </body>
</html>
