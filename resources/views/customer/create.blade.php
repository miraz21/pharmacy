@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Customer List</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
@csrf 
<div class="mb-3">
    <label for="name" class="form-label">Customer Name</label>
    <input type="text" name="name" class="form-control" id="name" >
  </div>
  <div class="mb-3">
    <label for="age" class="form-label">AGE</label>
    <input type="number" name="age" class="form-control" id="age" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

@endsection