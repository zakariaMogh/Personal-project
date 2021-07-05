@extends('user.layouts.app')

@section('title','how user')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('user.users.index')}}">Users</a></li>
    <li class="breadcrumb-item">Show</li>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- /.card-header -->
        <!-- form start -->
        <div>

            <div class="card-body">
                @include('user.layouts.partials.messages')

                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" id="title" name="title"  disabled
                           value="{{$user->name}}">
                </div>


                <div class="form-group">
                    <label for="content">Email</label>
                    <input type="text" class="form-control" id="email" name="email"  disabled
                           value="{{$user->email}}">

                </div>

                <div class="form-group">
                    <label for="is_admin">Is admin</label>
                    <input type="text" class="form-control" id="is_admin" name="is_admin"  disabled
                           value="{{$user->is_admin ? 'Yes' : 'No'}}">

                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex justify-content-end">
                <a class="btn btn-secondary text-white mr-2" href="{{route('user.users.index')}}">Back</a>
            </div>
        </div>
    </div>

@endsection
