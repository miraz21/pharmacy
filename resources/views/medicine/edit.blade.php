@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Edit Medicine </h3>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('medicine.edit', $medicine->id)}}" method="post" enctype="multipart/form-data">
@csrf 
    <div class="mb-3">
    <label for="name" class="form-label">Medicine Name</label>
    <input type="text" name="name" class="form-control" id="name" value="{{$medicine->name}}" >
  </div>
   <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" id="price" value="{{$medicine->price}}" >
  </div>
  <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="quantity" value="{{$medicine->quantity}}">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
</div>
@endsection