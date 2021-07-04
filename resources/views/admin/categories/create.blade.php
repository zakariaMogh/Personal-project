@extends('admin.layouts.app')

@section('title','Add category')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">Categories</a></li>
    <li class="breadcrumb-item">Create</li>
@endsection

@section('content')
    <div class="container-fluid">
    @include('admin.layouts.partials.messages')

    <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('admin.categories.store')}}">
            @csrf
            <div class="card-body">
                @include('admin.categories.form')
            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Ok</button>
            </div>
        </form>
    </div>

@endsection
