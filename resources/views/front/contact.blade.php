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
    <div class="container mb-5">
        <div class="row">
            <!-- Side widgets-->
            <div class="col-lg-4 d-flex flex-column justify-content-center">
                <h6>Name : </h6>
                <p>Zakaria Dehaba</p>
                <h6>Email : </h6>
                <p>Zakaria.dehaba@gmail.com</p>
                <h6>Address : </h6>
                <p>07 chidekh med smk Constantine, Algeria</p>
            </div>
            <!-- Blog entries-->
            <div class="col-lg-8">
                @if(session('rate_limit'))
                    <span class="text-danger small">
                                    <i class="fas fa-info-circle mr-1"></i>{{session('rate_limit')}}
                                    </span>
                @endif

                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <strong>Success!</strong> {{session()->get('success')}}.
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <strong>Error!</strong> {{session()->get('error')}}.
                    </div>
                @endif

                <form class="row" method="post" action="{{route('contact.store')}}">
                    @csrf
                    <div class="col-lg-12 mb-2">
                        <label for="email">Email :</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror"
                               name="email" id="email" placeholder="email@example.com">
                        @error('email')
                        <span class="text-danger">
                                        {{ $message }}
                                    </span>
                        @enderror
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="subject">Subject :</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror"
                               name="subject" id="subject" placeholder="subject">
                        @error('subject')
                        <span class="text-danger">
                                        {{ $message }}
                                    </span>
                        @enderror
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="description ">Description :</label>
                        <textarea name="description" id="description" cols="30" rows="10"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Description"></textarea>
                        @error('description')
                        <span class="text-danger">
                                        {{ $message }}
                                    </span>
                        @enderror
                    </div>
                    <div class="col-lg-12 d-flex justify-content-end">
                        <button class="btn btn-primary ">
                            Submit
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection
