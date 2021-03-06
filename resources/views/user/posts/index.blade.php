@extends('user.layouts.app')

@section('title','Posts')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>
    <li class="breadcrumb-item active">Posts</li>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @include('user.layouts.partials.messages')
                    <div class="card-header">
                        <a href="{{route('user.posts.create')}}" class="btn btn-primary">Add post</a>

                        <div class="card-tools">
                            @include('user.layouts.partials.search')

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Title</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $key => $post)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->created_at->format('d-m-Y')}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('user.posts.show', $post->id)}}" class="edit-btn mr-3"
                                           title="Edit"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('user.posts.edit', $post->id)}}" class="edit-btn"
                                           title="Edit"><i class="fas fa-edit"></i></a>
                                        <button class="delete-btn btn py-0 border-0"
                                                onclick="return confirm('Are you sure you want to delete this post ?')"
                                                id="delete-post" form="delete-post-form-{{$post->id}}">
                                            <i class="fas fa-trash-alt text-primary"></i>
                                        </button>
                                        <form action="{{route('user.posts.destroy', $post->id)}}" method="post"
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
                    {{$posts->links()}}
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection
