@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
		  <h2> Return Medicine </h2>		
		</div>
		<div class="col-md-6 text-right">
	      <a class="btn btn-info" href="{{ route('returnmedicine.create') }}"> <i class="fa fa-plus"></i> Add Return Medicine </a>
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
	    </div>
	    <div class="card-body">
	    <div class="table-responsive">



	        <table class="table table-borderless table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th scope="col">ID</th>
			      <th scope="col">Customer Name</th>
			      <th scope="col">Subtotal</th>
                  <th scope="col">Discount</th>
                  <th scope="col">GrandTotal</th>
                  <th scope="col">Sale By</th>
				  <th scope="col">Date</th>
				  <th scope="col">Action</th>
	            <tr>
				<tfoot>
				<tr>
	              <th>ID</th>
	              <th>Name</th>
	              <th class="text-right"></th>
	            </tr>
	          </tfoot>
	          <tbody>
	           @foreach($returnmedicines as $returnmedicine)
		       <tr>
		      <th scope="row">{{$loop->iteration}}</th>
		      <td>{{$returnmedicine->customer->name}}</td>
			  <td>{{number_format($returnmedicine->subtotal,2)}}</td>
			  <td>{{number_format($returnmedicine->discount,2)}}%</td>
			  <td>{{number_format($returnmedicine->grandtotal,2) }}</td>
		      <td>
				<span class="badge badge-info">{{$returnmedicine->user->name}}</span>
			  </td>
		      <td>{{ \Carbon\Carbon::parse($returnmedicine->created_at)->format('d-m-Y') }}</td>
		      <td>
			    <a href="{{ route('returnmedicine.details', $returnmedicine->id) }}" target="_blank" class="btn btn-warning">Details</a>
			    {{-- <a href="{{route('return.print', $returnmedicine->customer_id)}}" class="btn btn-sm btn-info">Print</a> --}}
		       <a href=""class="btn btn-warning">Delete</a> 
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
			{{$returnmedicines->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection