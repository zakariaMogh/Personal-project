@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Modifier la ligne</h1>
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
                <!-- /.card-header -->
                <!-- form start -->
                <div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="title" disabled
                                   value="{{$post->title}}">
                        </div>

                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select name="categories[]" id="categories" multiple class="form-control" disabled>
                                @foreach($post->categories as $category)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" name="content" cols="30" rows="10" disabled
                                      class="form-control ">{{$post->content}}</textarea>

                        </div>

                        <div class="form-group">
                            <img class="card-img-top"
                                 src="{{isset($post) ? asset($post->img_url) : asset('assets/front/images/default-post.png')}}"
                                 alt="{{isset($post) ? $post->title : ''}}"
                                 id="imagePreview"
                            />
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer d-flex justify-content-end">
                        <a class="btn btn-secondary text-white mr-2" href="{{route('admin.posts.index')}}">Back</a>
                    </div>
                </div>
            </div>

            <!-- /.card -->
        </section>
    </div>
@endsection
