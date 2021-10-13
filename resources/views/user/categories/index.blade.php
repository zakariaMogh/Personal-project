@extends('user.layouts.app')

@section('title','Categories')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @include('user.layouts.partials.messages')
                    <div class="card-header">
                        <a href="{{route('user.categories.create')}}" class="btn btn-primary">Add category</a>

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
                                <th>Name</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key => $category)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at->format('d-m-Y')}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('user.categories.show', $category->id)}}"
                                           class="edit-btn mr-3" title="Edit"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('user.categories.edit', $category->id)}}" class="edit-btn"
                                           title="Edit"><i class="fas fa-edit"></i></a>
                                        <button class="delete-btn btn py-0 border-0"
                                                onclick="return confirm('Are you sure you want to delete this category ?')"
                                                id="delete-category" form="delete-category-form-{{$category->id}}">
                                            <i class="fas fa-trash-alt text-primary"></i>
                                        </button>
                                        <form action="{{route('user.categories.destroy', $category->id)}}"
                                              method="post"
                                              id="delete-category-form-{{$category->id}}">
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
                    {{$categories->links()}}
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection
