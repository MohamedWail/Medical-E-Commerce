@extends('layouts.master')

@section('content')
  <div class="my-5" style="width: 50%">
    <form action="{{ route('category.update', $category->id) }}" method="post">
      @csrf
      @method('PATCH')
      <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
      </div>
      <label for="image_url" class="form-label">Category Image</label>
      <div>
        <input type="file" class="form-control"  name="image_url">
        <img style="width: 15%;" src="{{URL::asset($category->image_url)}}">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection