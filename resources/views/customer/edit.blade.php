@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Edit Customer</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('customer.edit', $customer->id)}}" method="post" enctype="multipart/form-data">
@csrf 
<div class="mb-3">
    <label for="name" class="form-label">Customer Name</label>
    <input type="text" name="name" class="form-control" id="name" value="{{ $customer->name }}">
  </div>
  <div class="mb-3">
    <label for="age" class="form-label">AGE</label>
    <input type="number" name="age" class="form-control" id="age" value="{{ $customer->age }}">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
</div>

@endsection