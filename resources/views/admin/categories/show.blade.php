@extends('admin.layouts.app')

@section('title','Show category')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">Categories</a></li>
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
                           value="{{$category->name}}">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex justify-content-end">
                <a class="btn btn-secondary text-white mr-2" href="{{route('admin.categories.index')}}">Back</a>
            </div>
        </div>
    </div>

@endsection
