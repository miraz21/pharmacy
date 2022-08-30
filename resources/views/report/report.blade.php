<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Pharmacy Management</title>
  </head>
  <body>
  <div class="container">
	<div class="row">
	<div class="col-12 col-md-12">
	<h1 style="text-align:center; margin-top:20px;">Pharmacy Daily Report</h1>
	</div>
	</div>
	<div class="row">
	<div class="col-12 col-md-12">
	<p style="margin-left:800px;">Date: {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</p>
	</div>
	</div>

	<div class="row mt-5">
	<div class="col-6 col-md-6">
	<p style="text-align:center; ">Pharmacy Sale</p>
	<table class="table table-border">
	<thead>
	<tr>
	<th>Total Sale</th>
	<th>Discount</th>
	<th>Grand Total</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>{{number_format( $order->sum('subtotal'),2) }}</td>
	<td>{{ $order->sum('discount') ?? '-' }}%</td>
	<td>{{number_format( $order->sum('grandtotal'),2) }}</td>

	</tr>
	</tbody>
	</table>
	</div>

    <div class="col-6 col-md-6">
        <p style="text-align:center;">Buy Medicine</p>
        <table class="table table-border">
        <thead>
        <tr>
        <th>Medicine Name</th>
        <th>Quantity</th>
        <th>Amount</th>
       
        </tr>
        </thead>
        <tbody>
          @foreach ($buy_medicine as $item)
        <tr>

        <td>{{ $item->medicine->name ?? '' }}</td>
        <td>{{ $item->quantity ?? "" }}</td>
        <td>{{ $item->amount ?? "" }}</td>
       
        </tr>
        @endforeach
        </tbody>
        <tfoot>
          <td></td>
          <td></td>
          <td>Total: {{ $buy_medicine->sum('amount'),2 }}</td>
        </tfoot>
        </table>
        </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 col-md-12">
                <p style="text-align:center;">Return Medicine</p>
                <table class="table table-border">
                <thead>
                <tr>
                <th>Medicine Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($return_medicine as $i)
                <tr>
                  <td>{{ $i->medicine->name ?? '' }}</td>
                  <td>{{ $i->price ?? '0' }}</td>
                  <td>{{ $i->quantity ?? '0' }}</td>
                  <td>{{ $i->total ?? '0' }}</td>
                
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Total: {{ number_format($return_medicine->sum('total'),2) ?? '0' }}</td>
                </tfoot>

                {{-- <div class="container">
                  <h1>Available Departments</h1><hr>
                
                  @foreach ($departments as $data)
                      <p><b> {{$data->department}} </b></p>
                  @endforeach
                </div> --}}

                </table>
                </div>
                </div>

	<div class="row mt-5">
	<div class="col-12 col-md-12">
	<p style="text-align:center;">----Good Day----</p>
	</div>
	</div>
	</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
