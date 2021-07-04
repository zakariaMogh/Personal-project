@extends('front.layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on {{$post->created_at->format('F d, Y')}} by
                            Dehaba zakaria
                        </div>
                        <!-- Post categories-->
                        @foreach($post->categories as $category)
                            <a class="badge bg-secondary text-decoration-none link-light"
                               href="{{route('home', ['category' => $category->slug])}}">{{$category->name}}</a>
                        @endforeach
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded"
                                              src="{{asset($post->img_url)}}" alt="{{$post->title}}"/>
                    </figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        {!! $post->content !!}
                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <strong>Success!</strong> {{session()->get('success')}}.
                                </div>
                            @endif

                            @if(session()->has('error'))
                                <div class="alert alert-danger alert-dismissible">
                                    <strong>Error!</strong> {{session()->get('error')}}.
                                </div>
                            @endif


                            <form class="mb-4" action="{{route('posts.comments.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="post" value="{{$post->id}}">
                                <textarea class="form-control @error('content') is-invalid @enderror" rows="3"
                                          name="content"
                                          placeholder="Join the discussion and leave a comment!"></textarea>
                                @error('content')
                                <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <div class=" text-right">
                                    <button type="submit" class="form-control">Submit</button>

                                </div>
                            </form>
                            <!-- Comment with nested comments-->

                            <!-- Parent comment-->
                            @foreach($post->users as $user)
                                <div class="d-flex mb-4">
                                    <div class="flex-shrink-0">
                                        <img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                             alt="..."/>
                                    </div>
                                    <div class="ms-3">
                                        <div class="fw-bold">{{$user->name}}</div>
                                        {!! $user->pivot->content !!}
                                    </div>
                                    @if(auth()->guard('user')->id() === $user->id)
                                        <div class="ms-auto">
                                            <button class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this comment ?')"
                                                    form="delete-comment-form-{{$user->pivot->id}}">Delete
                                            </button>
                                            <form action="{{route('posts.comments.destroy', $user->pivot->id)}}"
                                                  method="post" id="delete-comment-form-{{$user->pivot->id}}">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
                                    @elseif(auth()->guard('admin')->check())
                                        <div class="ms-auto">
                                            <button class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this comment ?')"
                                                    form="delete-comment-form-{{$user->pivot->id}}">Delete</button>
                                            <form action="{{route('admin.posts.comments.destroy', $user->pivot->id)}}"
                                                  method="post" id="delete-comment-form-{{$user->pivot->id}}">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
            @include('front.layouts.partials.search')
            <!-- Categories widget-->
                @include('front.layouts.partials.categories')

            </div>
        </div>
    </div>
@endsection
