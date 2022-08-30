@extends('admin.home')
@section('content')
<div class="container">
<div class="col-lg-12">
<div class="row">
<div class="col-md-12">
  <div class="card">
  <div class="card-header bg-info">
	<h5 class="text-center mt-3">Create New Medicine</h5>
  </div>
  <div class="card-body">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('medicine.store')}}" method="post" >
@csrf 

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Medicine</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th>
          <a  class="btn btn-sm btn-success add_more">
              <i class="fa fa-plus-circle"></i>
          </a>
      </th>
    </tr>
  </thead>
  <tbody class="addMoreMedicine">
    <tr>
      <th scope="row">1</th>
      <td>
        <input type="text" name="name[]" class="form-control name" id="name" placeholder="name">
      </td>
      <td>
          <input type="number" name="price[]" class="form-control price"  placeholder="price" step="0.01">
      </td>
      <td>
          <input type="number" name="quantity[]" class="form-control quantity"  placeholder="quantity">
      </td>
      <td>
          <a href="" class="btn btn-sm btn-danger">
              <i class="fa fa-minus-circle"></i>
          </a>
      </td>
    </tr>
   
  </tbody>
</table>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>


@section('scripts')

<script>
    $('.add_more').on('click',function() { 
     var medicienField = $('.name').html();


     var nmbrOfRow = ($('.addMoreMedicine tr').length -0 ) + 1;
     var row = `<tr>
                        <th scope="row">${nmbrOfRow}</th>
                        <td>
                          <input type="text" name="name[]" class="form-control name" id="name" placeholder="name" ${medicienField} >
                        </td>

                        <td>
                            <input type="number"  name="price[]" class="form-control price"  placeholder="price" >
                        </td>
                        <td>
                            <input type="number" name="quantity[]" class="form-control quantity"  placeholder="quantity">
                        </td>
                        <td>
                          <a  class="btn btn-sm btn-danger remove">
                                <i class="fa fa-minus-circle"></i>
                            </a>
                        </td>
                      </tr>`

                $('.addMoreMedicine').append(row);
        
    });

    //remove row

    $(".addMoreMedicine").delegate(".remove", "click",function(){
       $(this).parent().parent().remove();
   
  });

  </script>

@endsection
@endsection