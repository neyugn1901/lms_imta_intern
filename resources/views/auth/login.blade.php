<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>LMS - Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_home/img/favicon.svg') }}">
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
            <!-- Left side with carousel -->
            <div class="col-md-6 login-bg">
                <div class="owl-carousel login-slide owl-theme">
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="{{ asset('assets_home/img/login-img.png') }}" class="img-fluid" alt="Login Banner">
                        </div>
                        <div class="login-content">
                            <h2>Welcome to LMS</h2>
                            <p>Your learning journey starts here.</p>
                        </div>
                    </div>
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="{{ asset('assets_home/img/login-img2.png') }}" class="img-fluid" alt="Login Banner">
                        </div>
                        <div class="login-content">
                            <h2>Join Our Community</h2>
                            <p>Enhance your skills with our courses.</p>
                        </div>
                    </div>
                    <!-- Add more carousel items as needed -->
                </div>
            </div>
            
            <!-- Right side with login form -->
            <div class="col-md-6 login-wrap-bg">
                <div class="login-wrapper">
                    <div class="loginbox">
                        <div class="w-100">
                            <div class="img-logo">
                                <img src="{{ asset('assets_home/img/logo.svg') }}" class="img-fluid" alt="Logo">
                                
                            </div>
                            <h1>Sign into Your Account</h1>
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form method="POST" class="m-t" role="form" action="{{ route('auth.login') }}">
                                @csrf
                                <div class="input-block">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email address" required>
                                    @if ($errors->has('email'))
                                        <span class="error-message"> * {{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="input-block">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input" placeholder="Enter your password" required>
                                        <span class="feather-eye toggle-password"></span>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="error-message"> * {{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="forgot">
                                    <span><a class="forgot-link" href="">Forgot Password?</a></span>
                                </div>
                                <div class="remember-me">
                                    <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me
                                        <input type="checkbox" name="remember">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-start" type="submit">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="google-bg text-center">
                        <span><a href="#">Or sign in with</a></span>
                        <div class="sign-google">
                            <ul>
                                <li><a href=""><img src="{{ asset('assets_home/img/net-icon-01.png') }}" class="img-fluid" alt="Google"> Sign In using Google</a></li>
                                <li><a href=""><img src="{{ asset('assets_home/img/net-icon-02.png') }}" class="img-fluid" alt="Facebook"> Sign In using Facebook</a></li>
                            </ul>
                        </div>
                        <p class="mb-0">New User? <a href="{{ route('auth.register') }}">Create an Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('assets_home/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets_home/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets_home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets_home/js/script.js') }}"></script>
</body>
</html>