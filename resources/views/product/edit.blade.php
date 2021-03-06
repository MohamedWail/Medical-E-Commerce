@extends('layouts.master')

@section('content')
  <div class="my-5" style="width: 50%">
    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="col-md-9 mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
        <label for="category" class="form-label">Category</label>
        <select name="category_id" class="form-select" aria-label="Default select example">
          <option value="{{$product->category->id}}">{{$product->category->name}}</option>
          @foreach($categories as $category)
            @if ($category->id != $product->category->id)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endif          
          @endforeach
        </select>
        <label for="description" class="form-label">Description</label>
        <textarea type="text" class="form-control" id="description" name="description" >{{ $product->description }}</textarea>
        <label for="price" class="form-label">Price</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}">
        <label for="product_image" class="form-label">Product Image</label>
        <div>
          <input type="file" class="form-control"  name="path" value="{{URL::asset($product->path)}}">
          <img style="width: 35%;" src="{{URL::asset($product->path)}}">
        </div>
        <div>
          <input type="file" class="form-control"  name="logo_url" value="{{URL::asset($product->logo_url)}}"> 
          <small style="color: red">* Logo Image appears only in the Application *</small>
        </div>
        <img style="width: 35%;" src="{{URL::asset($product->logo_url)}}">
        <div class="form-check">
          <label class="form-check-label" for="is_hot_deal">
            Hot Deal 
          </label>
          <input 
            class="form-check-input" 
            type="checkbox" 
            value="1" 
            @if($product->is_Hot_deal==1) checked @endif id="flexCheckDefault" name="is_hot_deal">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection