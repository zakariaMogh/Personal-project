@extends('admin.layouts.app')

@section('title','how user')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
    <li class="breadcrumb-item">Show</li>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- /.card-header -->
        <!-- form start -->
        <div>

            <div class="card-body">
                @include('admin.layouts.partials.messages')

                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="title" disabled
                           value="{{$user->name}}">
                </div>


                <div class="form-group">
                    <label for="content">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="title" disabled
                           value="{{$user->email}}">

                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex justify-content-end">
                <a class="btn btn-secondary text-white mr-2" href="{{route('admin.users.index')}}">Back</a>
            </div>
        </div>
    </div>

@endsection
