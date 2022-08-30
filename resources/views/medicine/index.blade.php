@extends('admin.home')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
		  <h2> Medicine Store </h2>		
		</div>
		<div class="col-md-6 text-right">
	      <a class="btn btn-info" href="{{ route('medicine.create') }}"> <i class="fa fa-plus"></i> Add Medicine</a>
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    {{-- <div class="card-header py-3">
		  <form action="/search" class="navbar-form navbar-left">
		  <div class="form-group">
		  <input type="text" name="query" class="form-control search-box" cols="6px" placeholder="Search Medicine">
		  <button type="submit" class="btn btn-default">Search</button>
          </div>
          </form>
	    </div> --}}

	    <div class="card-body">
	    <div class="table-responsive">

	        <table class="table table-borderless table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th scope="col">ID</th>
			      <th scope="col">Medicine Name</th>
			      <th scope="col">Price</th>
			      <th scope="col">Quantity</th>
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
	           @foreach($medicines as $key=>$medicine)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$medicine->name}}</td>
		      <td>{{number_format($medicine->price, 2)}}</td>
		      <td>{{number_format($medicine->quantity)}}</td> 
		      <td>
		      <a href="{{route('medicine.edit', $medicine->id)}}"class="btn btn-primary">Edit</a>
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
			{{$medicines->links('pagination::bootstrap-4')}}
	      </div>
	    </div>
	  </div>
	  @endsection