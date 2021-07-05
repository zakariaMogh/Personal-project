@extends('front.layouts.app')
@section('content')
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Task!</h1>
                <p class="lead mb-0">A simple blog application</p>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="{{asset($post->img_url)}}" alt="{{$post->title}}" /></a>
                            <div class="card-body">
                                <div class="small text-muted">{{$post->created_at->format('F d, Y')}}</div>
                                <h2 class="card-title h4">{{\Illuminate\Support\Str::limit($post->title, 30, '...')}}</h2>
                                <p class="card-text">{{\Illuminate\Support\Str::limit($post->content, 100, '...')}}</p>
                                <a class="btn btn-primary" href="{{route('posts.show', $post->slug)}}">Read more →</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <div class="justify-content-center w-100 d-flex mt-1">
                        {{$posts->withQueryString()->links()}}
                    </div>

                </nav>
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
