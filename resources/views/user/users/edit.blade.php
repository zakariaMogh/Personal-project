@extends('user.layouts.app')

@section('title','Edit user')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('user.users.index')}}">Users</a></li>
    <li class="breadcrumb-item">Edit</li>
@endsection

@section('content')
    <div class="container-fluid">
    @include('user.layouts.partials.messages')

    <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{route('user.users.update', $user->id)}}">
            @csrf
            @method('put')
            <div class="card-body">
                @include('user.users.form')
            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex justify-content-end">
                <a class="btn btn-secondary text-white mr-2" href="{{route('user.users.index')}}">Back</a>
                <button type="submit" class="btn btn-primary">Ok</button>
            </div>
        </form>
    </div>

@endsection
