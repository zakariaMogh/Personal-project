<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description-gambolthemes" content="">
    <meta name="author-gambolthemes" content="">
    <title>Simple blog</title>
    <link rel="stylesheet" href="{{asset('assets/user/dist/css/adminlte.min.css')}}">


    <!-- Vendor Stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/user/plugins/fontawesome-free/css/all.min.css')}}">

</head>

<body class="bg-sign">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header card-sign-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>
                            <div class="card-body">
                                @if(session()->has('error'))
                                    <div class="col-12 text-center">
                                        <div class="alert alert-danger">{{session('error')}}</div>
                                    </div>
                                @endif
                                <form action="{{route('user.login')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-3" id="inputEmailAddress" type="email"
                                               placeholder="Email" name="email">
                                    </div>
                                    @error('email')
                                    <span class="text-danger" >
                                        {{ $message }}
                                    </span>
                                    @enderror

                                    <div class="form-group">
                                        <label class="form-label" for="inputPassword">Password</label>
                                        <input class="form-control py-3" id="inputPassword" type="password"
                                               placeholder="********" name="password">
                                    </div>
                                    @error('password')
                                    <span class="text-danger" >
                                        {{ $message }}
                                    </span>
                                    @enderror

                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="remember_me" id="remember">
                                        <label class="form-check-label" for="remember">
                                            Stay connected
                                        </label>
                                    </div>

                                    <div class="form-group d-flex align-items-center justify-content-end mt-4 mb-0">
                                        <a class="btn btn-sign hover-btn btn-outline-primary mr-2" href="{{route('user.register.index')}}">Register</a>
                                        <button class="btn btn-sign hover-btn btn-primary">Login</button>
                                    </div>

                                    <p class="mt-3">
                                        <a href="{{route('user.forgot.password.email')}}" class="text-decoration-none text-dark"><u>Forgot password ?</u></a>
                                    </p>
                                    <p class="mt-3">
                                        <a href="{{route('home')}}" class="text-decoration-none text-dark"><u>Back to home</u></a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="{{asset('assets/user/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/user/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- userLTE -->
<script src="{{asset('assets/user/dist/js/adminlte.js')}}"></script>

</body>
</html>
