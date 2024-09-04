{{--  <!DOCTYPE html>
<html>

    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="assets_admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets_admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets_admin/css/animate.css" rel="stylesheet">
    <link href="assets_admin/css/style.css" rel="stylesheet">
    <link href="assets_admin/css/customize.css" rel="stylesheet">

    </head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">LMS</h1>

            </div>
            <h3>Welcome to LMSX</h3>
           
            <p>Login in. To see it in action.</p>
            <form method="POST" class="m-t" role="form" action="{{ route('auth.login') }}" >
                @csrf
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Username" > 
                    @if ($errors->has('email'))
                         <span class="error-message"> * {{ $errors->first('email') }}</span>
                    @endif

                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" >
                    @if ($errors->has('password'))s
                        <span class="error-message"> * {{ $errors->first('password') }}</span>
                    @endif

                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('auth.register') }}">Create an account</a>
            </form>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="assets_admin/js/jquery-3.1.1.min.js"></script>
    <script src="assets_admin/js/bootstrap.min.js"></script>

</body>

</html>  --}}

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>LMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_home/img/favicon.svg') }}=">

    <link rel="stylesheet" href="{{ asset('assets_home/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_home/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_home/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_home/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_home/plugins/feather/feather.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_home/css/style.css') }}">
</head>

<body>

    <div class="main-wrapper log-wrap">
        <div class="row">

            <div class="col-md-6 login-bg">
                <div class="owl-carousel login-slide owl-theme">
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="assets/img/login-img.png" class="img-fluid" alt="Logo">
                        </div>
                        <div class="mentor-course text-center">
                            <h2>Welcome to <br>DreamsLMS Courses.</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="assets/img/login-img.png" class="img-fluid" alt="Logo">
                        </div>
                        <div class="mentor-course text-center">
                            <h2>Welcome to <br>DreamsLMS Courses.</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="assets/img/login-img.png" class="img-fluid" alt="Logo">
                        </div>
                        <div class="mentor-course text-center">
                            <h2>Welcome to <br>DreamsLMS Courses.</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 login-wrap-bg">

                <div class="login-wrapper">
                    <div class="loginbox">
                        <div class="w-100">
                            <div class="img-logo">
                                <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                                <div class="back-home">
                                    <a href="index-2.html">Back to Home</a>
                                </div>
                            </div>
                            <h1>Sign into Your Account</h1>
                            <form  method="POST" class="m-t" role="form" action="{{ route('auth.login') }}">
                                <div class="input-block">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter your email address">
                                    @if ($errors->has('email'))
                                        <span class="error-message"> * {{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="input-block">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input"  placeholder="Enter your password">
                                        @if ($errors->has('password'))
                                            <span class="error-message"> * {{ $errors->first('password') }}</span>
                                        @endif
                                        <span class="feather-eye toggle-password"></span>
                                    </div>
                                </div>
                                <div class="forgot">
                                    <span><a class="forgot-link" href="forgot-password.html">Forgot Password
                                            ?</a></span>
                                </div>
                                <div class="remember-me">
                                    <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me
                                        <input type="checkbox" name="radio">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-start" type="submit"  >Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="google-bg text-center">
                        <span><a href="#">Or sign in with</a></span>
                        <div class="sign-google">
                            <ul>
                                <li><a href="#"><img src="assets/img/net-icon-01.png" class="img-fluid"
                                            alt="Logo"> Sign
                                        In using Google</a></li>
                                <li><a href="#"><img src="assets/img/net-icon-02.png" class="img-fluid"
                                            alt="Logo">Sign
                                        In using Facebook</a></li>
                            </ul>
                        </div>
                        <p class="mb-0">New User ? <a href="{{ route('auth.register') }}">Create an Account</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('assets_home/js/jquery-3.7.1.min.js') }}" type="8443a8accfde7221b6767ac8-text/javascript"></script>

    <script src="{{ asset('assets_home/js/bootstrap.bundle.min.js') }}a" type="8443a8accfde7221b6767ac8-text/javascript"></script>

    <script src="{{ asset('assets_home/js/owl.carousel.min.js') }}" type="8443a8accfde7221b6767ac8-text/javascript"></script>

    <script src="{{ asset('assets_home/js/script.js') }}" type="8443a8accfde7221b6767ac8-text/javascript"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="8443a8accfde7221b6767ac8-|49" defer></script>
</body>


</html>
