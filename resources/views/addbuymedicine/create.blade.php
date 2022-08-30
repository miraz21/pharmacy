@extends('admin.home')
@section('content')
<div class="container">
<div class="col-lg-12">
<div class="row">
<div class="col-md-12">
  <div class="card">
  <div class="card-header bg-info">
	<h5 class="text-center mt-3">Add Buy Medicine</h5>
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

<form action="{{route('buymedicine.store')}}" method="post" >
@csrf
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Medicine</th>
      <th scope="col">Quantity</th>
      <th scope="col">Amount</th>
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
          <select class="form-select form-control medicine_id" name="medicine_id[]"  id="medicine_id" >
              <option value="" selected disabled>Select Medicine</option>
              @foreach($medicines as $item)
                  <option value="{{$item->id}}" data-price="{{ $item->price }}">{{$item->name}}</option>
              @endforeach
          </select>
      </td>

      <td>
          <input type="number" name="quantity[]" class="form-control quantity"  placeholder="quantity">
      </td>

      <td>
          <input type="text" name="amount[]" class="form-control amount"  placeholder="amount">
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
     var medicienField = $('.medicine_id').html();


     var nmbrOfRow = ($('.addMoreMedicine tr').length -0 ) + 1;
     var row = `<tr>
                        <th scope="row">${nmbrOfRow}</th>
                        <td>
                            <select class="form-select form-control medicine_id" name="medicine_id[]"  id="medicine_id" >
                              ${medicienField}
                            </select>
                        </td>
                      
                        <td>
                            <input type="number" name="quantity[]" class="form-control quantity"  placeholder="quantity">
                        </td>

                        <td>
                            <input type="text"  name="amount[]" class="form-control amount"  placeholder="amount">
                        </td>
                        <td>
                            <a  class="btn btn-sm btn-danger remove">
                                <i class="fa fa-minus-circle"></i>
                            </a>
                        </td>
                      </tr>`

                $('.addMoreMedicine').append(row);
        
    });

    //delete row

    $(".addMoreMedicine").delegate(".remove", "click",function(){
       $(this).parent().parent().remove();
    
  });

  </script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#medicine_id').select2({
      Placeholder: "Select Medicine",
      allowClear: true
    });
  });
  </script>

@endsection
@endsection