<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description-gambolthemes" content="">
    <meta name="author-gambolthemes" content="">
    <title>Admin</title>
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">


    <!-- Vendor Stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">

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
                                <h3 class="text-center font-weight-light my-4">Admin Forgot password</h3>
                            </div>
                            <div class="card-body">
                                @if(session()->has('status'))
                                    <div class="col-12 text-center">
                                        <div class="alert alert-success">{{session('status')}}</div>
                                    </div>
                                @endif
                                <form action="{{route('admin.forgot.password.send')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-3" id="inputEmailAddress" type="email"
                                               placeholder="Adresse Email" name="email">
                                    </div>
                                    <div>
                <span class="text-muted small mt-1">
                    Enter the email address associated with your account
                </span>
                                    </div>
                                    @error('email')
                                    <span class="text-danger" >
                                        {{ $message }}
                                    </span>
                                    @enderror

                                    <div class="form-group d-flex align-items-center justify-content-end mt-4 mb-0">
                                        <button class="btn btn-sign hover-btn btn-primary">Send</button>
                                    </div>

                                    <p class="mt-4">
                                        <a href="{{route('admin.login')}}" class="text-decoration-none text-dark"><u>Login ?</u></a>
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
<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('assets/admin/dist/js/adminlte.js')}}"></script>

</body>
</html>
