
<!DOCTYPE html>
<html>

    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <link href="{{ asset('assets_admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href=" {{ asset('assets_admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_admin/css/customize.css') }}" rel="stylesheet">

    </head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">LMS</h1>

            </div>
            <h3>Welcome to LMSX</h3>
           
            <p>REGISTER</p>
            <span>{{ $message ?? '' }}</span>
                <form method="POST" class="m-t" role="form"  >
                    @csrf
                    <div class="form-group">
                        <input type="text" name="fullname" class="form-control" placeholder="Fullname" > 
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email" >   
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" >
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" >
                    </div>

                    <button type="submit" class="btn btn-primary block full-width m-b">Register</button>
    
                   
                 
                    <a class="btn btn-sm btn-white btn-block" href="{{ route('auth.admin') }}"> Return to Login</a>
                </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('assets_admin/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/bootstrap.min.js') }}"></script>

</body>

</html>

