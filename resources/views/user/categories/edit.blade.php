@extends('user.layouts.app')

@section('title','Edit category')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('user.categories.index')}}">Categories</a></li>
    <li class="breadcrumb-item">Edit</li>
@endsection

@section('content')
    <div class="container-fluid">
    @include('user.layouts.partials.messages')

    <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{route('user.categories.update', $category->id)}}">
            @csrf
            @method('put')
            <div class="card-body">
                @include('user.categories.form')
            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex justify-content-end">
                <a class="btn btn-secondary text-white mr-2" href="{{route('user.categories.index')}}">Back</a>
                <button type="submit" class="btn btn-primary">Ok</button>
            </div>
        </form>
    </div>

@endsection
