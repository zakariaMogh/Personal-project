@extends('user.layouts.app')

@section('title','Show post')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('user.posts.index')}}">Posts</a></li>
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
                <a class="btn btn-secondary text-white mr-2" href="{{route('user.posts.index')}}">Back</a>
            </div>
        </div>
    </div>

@endsection
