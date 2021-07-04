@extends('front.layouts.app')
@section('content')
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Task!</h1>
                <p class="lead mb-0">A simple blog application</p>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <!-- Side widgets-->
            <div class="col-lg-4">
                info
            </div>
            <!-- Blog entries-->
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6">
                        email
                    </div>
                    <div class="col-lg-6">
                        subject
                    </div>
                    <div class="col-lg-12">
                        description
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
