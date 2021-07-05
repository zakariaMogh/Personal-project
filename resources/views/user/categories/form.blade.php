<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name"
           value="{{$category->name ?? old('name')}}">
</div>
@error('name')
<div class="text-danger">
    {{$message}}
</div>
@enderror


