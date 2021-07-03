<div class="card mb-4">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <div class="row">
            @foreach($categories as $category)
            <div class="col-sm-4">
                <a href="{{route('home', ['category' => $category->slug])}}">{{$category->name}}</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
