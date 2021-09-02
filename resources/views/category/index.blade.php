@extends('layouts.master')

@section('content')
<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Category Table
      <a href="{{ route('category.create') }}" class="btn btn-success a-btn-slide-text">
        <span><strong>Add Category</strong></span>
    </a>  </div>
  <div class="card-body">
      <table id="datatablesSimple">
          <thead>
              <tr>
                <th>Name</th>
                <th>Actions</th>
              </tr>
          </thead>
          <tfoot>
              <tr>
                <th>Name</th>
                <th>Actions</th>
              </tr>
          </tfoot>
          @foreach ($categories as $category )
              <tbody>
                  <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                      <form class="myform"  id="{{$category->id}}"  method="post"  action="{{(route('category.destroy',$category->id))}}">
                          @csrf
                          @method('DELETE') 

                          <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success a-btn-slide-text">
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