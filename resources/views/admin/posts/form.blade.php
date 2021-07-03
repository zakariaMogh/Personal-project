<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
           placeholder="title"
           value="{{$post->title ?? old('title')}}">
</div>
@error('title')
<div class="text-danger">
    {{$message}}
</div>
@enderror

<div class="form-group">
    <label for="categories">Categories</label>
    <select name="categories[]" id="categories" multiple class="form-control @error('categories') is-invalid @enderror">
        @foreach($categories as $category)
            <option value="{{$category->id}}" {{isset($post) ? ($post->categories->contains($category->id) ? 'selected' : '') : ''}}>{{$category->name}}</option>
        @endforeach
    </select>
</div>
@error('categories')
<div class="text-danger">
    {{$message}}
</div>
@enderror

<div class="form-group">
    <label for="content">Content</label>
    <textarea id="content" name="content" cols="30" rows="10"
              class="form-control @error('content') is-invalid @enderror">{{$post->content ?? old('content')}}</textarea>

</div>
@error('content')
<div class="text-danger">
    {{$message}}
</div>
@enderror
