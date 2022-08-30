@extends('admin.home')
@section('content')
    <div class="row clearfix page_header">
        <div class="col-md-6">
            <h2> Sale Details </h2>
        </div>
        <div class="col-md-6 text-right">
            {{-- <a class="btn btn-info" href="{{ route('sale.create') }}"> <i class="fa fa-plus"></i> Add Sale </a> --}}
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
                        <th scope="col">Medicine Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                        {{-- <th scope="col">Action</th> --}}
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($orderItems as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->medicine->name}}</td>
                            <td>{{number_format($item->price, 2)}}</td>
                            <td>{{number_format($item->quantity)}}</td>
                            <td>{{number_format($item->total,2)}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <!-- <th>Total: </th> -->
                        <th class="text-right"></th>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
@endsection
