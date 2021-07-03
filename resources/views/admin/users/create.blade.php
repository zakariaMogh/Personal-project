@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add user</h1>
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
                <form method="POST" action="{{route('admin.users.store')}}">
                    @csrf
                    <div class="card-body">
                        @include('admin.users.form')
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>

            <!-- /.card -->
        </section>
    </div>
@endsection
