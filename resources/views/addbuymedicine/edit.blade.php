@extends('admin.home')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Edit Buy Medicine</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('buymedicine.edit', $buymedicine->id)}}" method="post" enctype="multipart/form-data">
@csrf 
  <div class="mb-3">
    <label for="name" class="form-label">Select Medicine</label>
    <select class="form-select">
      <option value="">{{$buymedicine->medicines->name}}</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $buymedicine->quantity }}">
  </div>
  <div class="mb-3">
    <label for="amount" class="form-label">Amount</label>
    <input type="number" name="amount" class="form-control" id="amount" value="{{ $buymedicine->amount }}">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#medicine_id').select2({
      Placeholder: "Select Medicine",
      allowClear: true
    });
  });
  </script>

@endsection