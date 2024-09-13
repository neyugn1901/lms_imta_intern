<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>LMS - Register</title>
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
            <div class="col-md-6 login-bg">
                <div class="owl-carousel login-slide owl-theme">
                    <!-- Add the carousel items here -->
                </div>
            </div>
            <div class="col-md-6 login-wrap-bg">
                <div class="login-wrapper">
                    <div class="loginbox">
                        <div class="w-100">
                            <div class="img-logo">
                                <img src="{{ asset('assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
                                <div class="back-home">
                                    <!-- Optional: Link to go back to homepage -->
                                </div>
                            </div>
                            <h1>Create Your Account</h1>
                            <form method="POST" action="{{ route('auth.register') }}">
                                @csrf
                                <div class="input-block">
                                    <label class="form-control-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter your name">
                                    @if ($errors->has('name'))
                                        <span class="error-message"> * {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="input-block">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email address">
                                    @if ($errors->has('email'))
                                        <span class="error-message"> * {{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="input-block">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input" placeholder="Enter your password">
                                        @if ($errors->has('password'))
                                            <span class="error-message"> * {{ $errors->first('password') }}</span>
                                        @endif
                                        <span class="feather-eye toggle-password"></span>
                                    </div>
                                </div>
                                <div class="input-block">
                                    <label class="form-control-label">Confirm Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password_confirmation" class="form-control pass-input" placeholder="Confirm your password">
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-start" type="submit">Register</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    <div class="google-bg text-center">
                        <span><a href="#">Or register with</a></span>
                        <div class="sign-google">
                            <ul>
                                <li><a href="#"><img src="{{ asset('assets/img/net-icon-01.png') }}" class="img-fluid" alt="Google"> Register using Google</a></li>
                                <li><a href="#"><img src="{{ asset('assets/img/net-icon-02.png') }}" class="img-fluid" alt="Facebook"> Register using Facebook</a></li>
                            </ul>
                        </div>
                        <p class="mb-0">Already have an account? <a href="{{ route('auth.login') }}">Sign In</a></p>
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
