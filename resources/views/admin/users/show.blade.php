@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Show user</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
{{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.card-header -->
                <!-- form start -->
                <div >

                    <div class="card-body">
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

            <!-- /.card -->
        </section>
    </div>
@endsection