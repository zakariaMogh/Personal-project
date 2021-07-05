@extends('user.layouts.app')

@section('title','Add category')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('user.categories.index')}}">Categories</a></li>
    <li class="breadcrumb-item">Create</li>
@endsection

@section('content')
    <div class="container-fluid">
    @include('user.layouts.partials.messages')

    <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('user.categories.store')}}">
            @csrf
            <div class="card-body">
                @include('user.categories.form')
            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Ok</button>
            </div>
        </form>
    </div>

@endsection
