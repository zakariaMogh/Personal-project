@extends('user.layouts.app')

@section('title','Show category')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('user.categories.index')}}">Categories</a></li>
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
                    <input type="text" class="form-control" id="title" name="title" placeholder="title" disabled
                           value="{{$category->name}}">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex justify-content-end">
                <a class="btn btn-secondary text-white mr-2" href="{{route('user.categories.index')}}">Back</a>
            </div>
        </div>
    </div>

@endsection
