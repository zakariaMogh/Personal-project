@extends('user.layouts.app')

@section('title','Add user')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('user.users.index')}}">Users</a></li>
    <li class="breadcrumb-item">Create</li>
@endsection

@section('content')

    <div class="container-fluid">
    @include('user.layouts.partials.messages')

    <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('user.users.store')}}">
            @csrf
            <div class="card-body">
                @include('user.users.form')
            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Ok</button>
            </div>
        </form>
    </div>

@endsection
