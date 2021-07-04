<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description-gambolthemes" content="">
    <meta name="author-gambolthemes" content="">
    <title>Simple blog</title>
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
                                <h3 class="text-center font-weight-light my-4">Reset password</h3>
                            </div>
                            <div class="card-body">
                                @if(session()->has('error'))
                                    <div class="col-12 text-center">
                                        <div class="alert alert-danger">{{session('error')}}</div>
                                    </div>
                                @endif
                                <form action="{{route('reset')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="token" value="{{$token}}">

                                    <div class="form-group">
                                        <label class="form-label" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-3" id="inputEmailAddress" type="email"
                                               placeholder="Adresse Email" name="email">
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

                                    <div class="form-group">
                                        <label class="form-label" for="inputPassword">Confirm password</label>
                                        <input class="form-control py-3" id="inputPassword" type="password"
                                               placeholder="********" name="password_confirmation">
                                    </div>


                                    <div class="form-group d-flex align-items-center justify-content-end mt-4 mb-0">
                                        <button class="btn btn-sign hover-btn btn-primary">Save</button>
                                    </div>


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
