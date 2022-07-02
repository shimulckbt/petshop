@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All products</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    All Products</div>
                                <div class="h5 mb-0 mt-2 font-weight-bold text-gray-800">
                                    <table class="table">
                                        <thead class="thead-light">
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)                                                
                                            <tr>
                                              <th scope="row">{{ $loop->index + 1}}</th>
                                              <td>{{ $product->name }}</td>
                                              <td>{{ $product->short_description }}</td>
                                              <td>{{ $product->status == true ? "Active" :"Inactive" }}</td>
                                              <td>
                                                <form method="POST" class="d-inline" action="{{ route('products.toggle', $product) }}">
                                                    @csrf
                                                    <input type="submit" class="btn btn-sm {{ $product->status == false ? 'btn-primary' : 'btn-warning' }}" value="{{ $product->status == false ? "Activate" :"Deactivate" }}">
                                                </form>
                                                <form method="POST" class="d-inline" action="{{ route('products.destroy', $product) }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete" />
                                                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                                </form>
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

    </div>
@endsection