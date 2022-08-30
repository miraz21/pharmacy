@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
		  <h2> Customer Document </h2>		
		</div>
		<div class="col-md-6 text-right">
	      <a class="btn btn-info" href="{{ route('customer.create') }}"> <i class="fa fa-plus"></i> Add Customer </a>
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
                  <th scope="col">Age</th>                 
                  <th scope="col">Date</th>
			     <th scope="col">Action</th>
	            </tr>
	          </thead>
	          <tfoot>
	            <tr>
	              <th>ID</th>
	              <th>Name</th>
	              <th class="text-right"></th>
	            </tr>
	          </tfoot>
	          <tbody>
	           @foreach($customers as $key=>$customer)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$customer->name}}</td>
		      <td>{{$customer->age}}</td> 
		      <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d-m-Y') }}</td>
		      <td>
				<a href="{{route('customer.edit', $customer->id)}}"class="btn btn-warning">Edit</a>
		      	{{-- <a href="{{route('buymedicine.delete', $buymedicine->id)}}"class="btn btn-warning">Delete</a> --}}
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
			{{$customers->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection