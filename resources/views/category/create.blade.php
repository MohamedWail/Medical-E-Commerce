@extends('layouts.master')

@section('content')
  <div class="my-5" style="width: 50%">
    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <label for="image_url" class="form-label">Category Image</label>
        <div>
          <input type="file" class="form-control"  name="image_url">
        </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection