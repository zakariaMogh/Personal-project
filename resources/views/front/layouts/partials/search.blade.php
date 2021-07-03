<div class="card mb-4">
    <div class="card-header">Search</div>
    <div class="card-body">
        <form class="input-group" action="{{route('home')}}" method="get">
            <input class="form-control" type="text" placeholder="Enter search term..."
                   aria-label="Enter search term..."
                   aria-describedby="button-search" name="search" value="{{request()->get('search')}}"/>
            <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
        </form>
    </div>
</div>
