@extends('layouts.master')

@section('content')
<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Product Table
      <a href="{{ route('product.create') }}" class="btn btn-success a-btn-slide-text">
        <span><strong>Add Product</strong></span>
    </a>  </div>
  <div class="card-body">
      <table id="datatablesSimple">
          <thead>
              <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Descripton</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
          </thead>
          <tfoot>
              <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Descripton</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
          </tfoot>
          @foreach ($products as $product )
              <tbody>
                  <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->description}}</td>
                    <td>{{ $product->price }}</td>
                    <td><img style="width: 35%;" src="{{URL::asset($product->path)}}"></td>
                    <td>
                      <form class="myform"  id="{{$product->id}}"  method="post"  action="{{(route('product.destroy',$product->id))}}">
                          @csrf
                          @method('DELETE') 

                          <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success a-btn-slide-text">
                              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                              <span><strong>Edit</strong></span>
                          </a>
                        <button class="btn btn-danger a-btn-slide-text" style="float: none;">
                          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                          <span><strong>Delete</strong></span>
                        </button>
                      </form>
                  </td>
                  </tr>
              </tbody>
          @endforeach
          
      </table>
  </div>
</div>
@endsection