@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All products</h1>
        </div>

        <!-- Content Row -->
        
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" role="grid"
                                        aria-describedby="dataTable_info" style="width: 100%;" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr role="row">
                                                <th class="text-center" scope="col">#</th>
                                                <th class="text-center" scope="col">Name</th>
                                                <th class="text-center" scope="col">Description</th>
                                                <th class="text-center" scope="col">Status</th>
                                                <th class="text-center" scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td class="text-center sorting_1">{{ $loop->index + 1 }}</td>
                                                    <td class="text-center">{{ $product->name }}</td>
                                                    <td class="text-center">
                                                        {{ $product->short_description }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $product->status == true ? 'Active' : 'Inactive' }}
                                                    </td>
                                                    <td class="text-center">
                                                        @if (auth()->user()->role->name == 'Admin')
                                                            <form method="POST" class="d-inline"
                                                                action="{{ route('products.toggle', $product) }}">
                                                                @csrf
                                                                <input type="submit"
                                                                    class="btn btn-sm {{ $product->status == false ? 'btn-primary' : 'btn-warning' }}"
                                                                    value="{{ $product->status == false ? 'Activate' : 'Deactivate' }}">
                                                            </form>
                                                        @endif
                                                        <form method="POST" class="d-inline"
                                                            action="{{ route('products.destroy', $product) }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="delete" />
                                                            <input type="submit" class="btn btn-sm btn-danger"
                                                                value="Delete">
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
@endsection
