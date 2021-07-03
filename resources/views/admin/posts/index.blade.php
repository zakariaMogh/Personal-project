@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Posts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
{{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                            <li class="breadcrumb-item active">Posts</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @include('admin.layouts.partials.messages')
                            <div class="card-header">

                                <div class="card-tools">
                                    <form >
                                        <div class="input-group input-group-sm" style="width: 150px;">

                                            <input type="text" name="search" class="form-control float-right"
                                                   placeholder="Rechercher" value="{{request()->get('search')}}">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" >
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $key => $post)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$post->user->name}}</td>
                                            <td>{{$post->title}}</td>
                                            <td class="d-flex">
                                                <a href="{{route('admin.posts.show', $post->id)}}" class="edit-btn mr-3" title="Edit"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('admin.posts.edit', $post->id)}}" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                                <button class="delete-btn btn py-0 border-0" onclick="return confirm('Are you sure you want to delete this post ?')"
                                                        id="delete-post" form="delete-post-form-{{$post->id}}">
                                                    <i class="fas fa-trash-alt text-primary"></i>
                                                </button>
                                                <form action="{{route('admin.posts.destroy', $post->id)}}" method="post"
                                                      id="delete-post-form-{{$post->id}}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card-footer d-flex justify-content-center pt-4">
                            {{$posts->withQueryString()->links()}}
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
