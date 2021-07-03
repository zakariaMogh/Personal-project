<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description-gambolthemes" content="">
    <meta name="author-gambolthemes" content="">
    <title>Login Admin</title>
    <link rel="stylesheet" href="{{asset('admin_assets/dist/css/adminlte.min.css')}}">


    <!-- Vendor Stylesheets -->
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/fontawesome-free/css/all.min.css')}}">

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
                                <h3 class="text-center font-weight-light my-4">S'identifier</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())

                                    <div class="w-100 px-4 text-danger mb-2">
                                        @foreach ($errors->all() as $error)
                                            * {{ $error }}<br>
                                        @endforeach
                                    </div>

                                @endif
                                <form action="{{route('admin.login')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-3" id="inputEmailAddress" type="email"
                                               placeholder="Adresse Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="inputPassword">Mot de passe</label>
                                        <input class="form-control py-3" id="inputPassword" type="password"
                                               placeholder="Mot de passe" name="password">
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-sign hover-btn" >S'identifier</button>
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
<script src="{{asset('admin_assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('admin_assets/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('admin_assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin_assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin_assets/dist/js/pages/dashboard3.js')}}"></script>

</body>
</html>
