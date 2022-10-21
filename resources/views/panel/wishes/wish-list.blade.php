@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Wishes</h1>
        </div>

        <!-- Content Row -->

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" role="grid"
                                    aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center" scope="col">#</th>
                                            <th class="text-center" scope="col">Product</th>
                                            <th class="text-center" scope="col">Image</th>
                                            <th class="text-center" scope="col">Unit Price</th>
                                            <th class="text-center" scope="col">Stock</th>
                                            <th class="text-center" scope="col" width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wishes as $wish)
                                            <tr>
                                                <td class="text-center sorting_1">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">
                                                    {{ $wish->product->name }}
                                                </td>
                                                <td class="text-center">
                                                    <img src="{{ asset('storage/' . $wish->product->image->image) }}" class="img-fluid" width=30px alt="">
                                                </td>
                                                <td class="text-center">
                                                    {{ $wish->product->unit_price_selling }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $wish->product->stock > 0 ? 'Available' : 'Out of stock' }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('removeWish', $wish->id) }}" class="btn btn-danger">Remove</a>                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
