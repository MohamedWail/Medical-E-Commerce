@extends('layouts.master')

@section('content')
  <div class="my-5" style="width: 50%">
    <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') ?? $contact->address ?? '' }}
        ">
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') ?? $contact->phone ?? '' }} 
        ">
      </div>
      <label for="reach_us_image" class="form-label">Reach Us Image</label>
      <div>
        <input type="file" class="form-control"  name="reach_us_image">
        @if ($contact->reach_us_image)
          <img style="width: 35%;" src="{{URL::asset($contact->reach_us_image)}}">
        @endif

      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection