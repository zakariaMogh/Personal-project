@extends('admin.layouts.app')

@section('title','Edit user')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
    <li class="breadcrumb-item">Edit</li>
@endsection

@section('content')
    <div class="container-fluid">
    @include('admin.layouts.partials.messages')

    <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{route('admin.users.update', $user->id)}}">
            @csrf
            @method('put')
            <div class="card-body">
                @include('admin.users.form')
            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex justify-content-end">
                <a class="btn btn-secondary text-white mr-2" href="{{route('admin.users.index')}}">Back</a>
                <button type="submit" class="btn btn-primary">Ok</button>
            </div>
        </form>
    </div>

@endsection
