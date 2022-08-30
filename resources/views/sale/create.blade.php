@extends('admin.home')
@section('content')
<div class="container">
    <div class="col-lg-12">
    <div class="row">
        {{-- <div class="col-md-2"></div> --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="text-center"> Medicine Sales </h5>
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

            <form action="{{route('sale.store')}}" method="post">
                @csrf
     
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Medicine</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
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
                            <input type="text" readonly  name="price[]" class="form-control price"  placeholder="price">
                        </td>

                        <td>
                            <input type="number" name="quantity[]" class="form-control quantity"  placeholder="quantity">
                        </td>

                        <td>
                            <input type="text" name="total[]" readonly class="form-control total"  placeholder="total">
                        </td>
                        
                        <td>
                            <a href="" class="btn btn-sm btn-danger">
                                <i class="fa fa-minus-circle"></i>
                            </a>
                        </td>
                      </tr>
                     
                    </tbody>
                  </table>
               
          
        </div>
    </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="total">SubTotal: <b class="subtotal">0.00</b></h4>
                </div>
                <div class="card-body">

               
                <div class="mb-3 ">
                    <label for="customer_id">Customer Name</label>
                    <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#createCustomer" title="add customer">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                    <select class="form-control" name="customer_id" id="customer_id">
                        @foreach($customers as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>

                 <div class="mb-6">
                  <label for="subtotal" class="form-label">Subtotal</label>
                  <input type="text" readonly name="subtotal" class="form-control" id="subtotal">
                </div>
                <div class="mb-6">
                  <label for="discount" class="form-label">Discount (%)</label>
                  <input type="text" min="1" max="99" name="discount" class="form-control" id="discount">
                </div>

                <div class="mb-6">
                  <label for="grandtotal" class="form-label">Total</label>
                  <input type="text" readonly name="grandtotal" class="form-control " id="grandtotal">
                </div>

                <button type="submit" class="btn btn-info mt-3">Place Order</button>
            </form>
            </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal custom fade" id="createCustomer" tabindex="-1" role="dialog" aria-labelledby="createCustomerLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createCustomerLabel">Add Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('customer.store')}}" method="POST">
                @csrf
                <input type="hidden" name="modal" value="modal">
                <div class="form-group">
                    <label for="NameLabel">Customer Name</label>
                    <input type="text" id="NameLabel" name="name" placeholder="customer name"
                        class="form-control">
                </div>

                 <div class="form-group">
                    <label for="NameLabel">Customer Age</label>
                    <input type="text" id="NameLabel" name="age" placeholder="customer age"
                        class="form-control">
                </div>

               
                <div class="modal-footer">
                    <button class="btn btn-info btn-block">Create</button>
                </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>

  
  <style>

    .modal.fade:not(.in).custom .modal-dialog{
        -webkit-transform: translate3d(25%,0,0);
        transform:translate3d(25%,0,0);
    }
</style>

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
                            <input type="text" readonly  name="price[]" class="form-control price"  placeholder="price" >
                        </td>
                        <td>
                            <input type="number" name="quantity[]" class="form-control quantity"  placeholder="quantity">
                        </td>

                        <td>
                            <input type="text" readonly name="total[]" class="form-control total"  placeholder="total">
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
       subTotalAmount();
       grandTotal();
  });


  //change vlaue
  $(".addMoreMedicine").delegate(".medicine_id", "change",function(){
      var tr = $(this).parent().parent();
     var getprice = tr.find('.medicine_id option:selected').attr('data-price');
     tr.find('.price').val(getprice);
     var qty = tr.find('.quantity').val();
     var price = tr.find('.price').val();
     var totalAmount = price * qty;
     tr.find('.total').val(totalAmount);
     subTotalAmount();
     grandTotal();


  });


  $(".addMoreMedicine").delegate(".quantity", "keyup",function(){
      var tr = $(this).parent().parent();

     var qty = tr.find('.quantity').val();
     var price = tr.find('.price').val();
     var totalAmount = price * qty;
     tr.find('.total').val(totalAmount);
     subTotalAmount();
     grandTotal();

    //  console.log(totalAmount);

  });


  //subtotal calculation
  function subTotalAmount(){
    var subtotal = 0;
    $('.total').each(function (i, e) { 
         var total = $(this).val() - 0;
         subtotal += total;
    });

   $('.subtotal').html(subtotal);
   $('#subtotal').val(subtotal);

  }


  //grand total 
  $('#discount').keyup(function () { 
        var sub =  $('#subtotal').val();
        var disc = $(this).val();
        var grandtotal = sub - ((sub * disc) /100);
        $('#grandtotal').val(grandtotal);
  });

  //grand total
  function grandTotal(){
    var sub =  $('#subtotal').val();
        var disc = $('#discount').val();
        var grandtotal = sub - ((sub * disc) /100);
        $('#grandtotal').val(grandtotal);
  }

</script>
@endsection
@endsection