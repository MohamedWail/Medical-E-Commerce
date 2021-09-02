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
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection