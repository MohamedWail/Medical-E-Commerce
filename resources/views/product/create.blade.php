@extends('layouts.master')

@section('content')
  <div class="my-5" style="width: 50%">
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="col-md-9 mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="name">
        <label for="category" class="form-label">Category</label>
        <select name="category_id" class="form-select" aria-label="Default select example">
          <option selected>Select Category</option>
          @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
        <label for="description" class="form-label">Description</label>
        <textarea type="text" class="form-control" id="description" name="description"></textarea>
        <label for="price" class="form-label">Price</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price">
        <label for="product_image" class="form-label">Product Image</label>
        <div>
          <input type="file" class="form-control"  name="path">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection