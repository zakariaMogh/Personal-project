@extends('user.layouts.app')

@section('title','Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item">Home</li>
@endsection

@section('content')
    <div class="container-fluid">
        @include('user.layouts.partials.messages')
        <div class="row">

            <div class="col-12 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number">{{$users_count}}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-book"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Posts</span>
                        <span class="info-box-number">{{$posts_count}}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-heart"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Comments</span>
                        <span class="info-box-number">{{$comments_count}}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-comment"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Categories</span>
                        <span class="info-box-number">{{$categories_count}}</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-3">

            <section class="col-lg-12">

                <div class="card">
                    <div class="card-header border-0 bg-dark">
                        <h3 class="card-title">
                            Posts per category
                        </h3>
                        <div class="card-tools mr-1">
                            <a href="javascript:void(0)"
                               class="text-light"
                               data-card-widget="collapse"
                               data-toggle="tooltip"
                               title="Collapse">
                                <i class="fas fa-minus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <canvas id="donnut" style="max-height: 287px"></canvas>
                        </div>
                    </div>
                    @if(auth()->user()->is_admin)
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="{{route('user.categories.index')}}"
                               class="text-decoration-none text-dark">Categories</a>
                        </div>
                    </div>
                    @endif
                </div>

            </section>

        </div>

    </div>

@endsection

@push('js')
    <script>
        var ctx = document.getElementById('donnut').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    @foreach($categories as $category)
                        '{{$category->name}}'{{!$loop->last ? ',' : ''}}
                    @endforeach
                ],
                datasets: [{
                    label: '# of categories',
                    data: [
                        @foreach($categories as $category)
                            '{{$category->posts_count}}'{{!$loop->last ? ',' : ''}}
                        @endforeach
                    ],
                    borderWidth: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
