@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Orders</h1>
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
                                            <th class="text-center" scope="col">Order No.</th>
                                            <th class="text-center" scope="col">Product</th>
                                            <th class="text-center" scope="col">Qty</th>
                                            <th class="text-center" scope="col">Unit Price</th>
                                            <th class="text-center" scope="col">Total Price</th>
                                            <th class="text-center" scope="col">Approved</th>
                                            <th class="text-center" scope="col">Delivered</th>
                                            @if (auth()->user()->role->name == 'Admin' ||
                                                (auth()->user()->role->name === 'Seller' &&
                                                    isset(Auth::user()->sellerDetail) &&
                                                    Auth::user()->sellerDetail->is_verified === 1))
                                                <th class="text-center" scope="col" width="20%">Order Action</th>
                                                <th class="text-center" scope="col" width="20%">Delivery Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="text-center sorting_1">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">{{ $order->order_no }}</td>
                                                <td class="text-center">
                                                    {{ $order->product->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $order->qty }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $order->unit_price }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $order->total_price }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($order->is_aproved == true)
                                                        Approved
                                                    @elseif ($order->is_aproved === null)
                                                        N/A
                                                    @else
                                                        Declined
                                                    @endif

                                                </td>
                                                <td class="text-center">
                                                    @if ($order->is_delivered == true)
                                                        Delivered
                                                    @elseif ($order->is_delivered === null)
                                                        Pending
                                                    @else
                                                        Declined
                                                    @endif
                                                </td>
                                                @if (auth()->user()->role->name == 'Admin' ||
                                                    (auth()->user()->role->name === 'Seller' &&
                                                        isset(Auth::user()->sellerDetail) &&
                                                        Auth::user()->sellerDetail->is_verified === 1))
                                                    <td class="text-center">
                                                        <form method="POST" class="d-inline"
                                                            action="{{ route('approve-order', $order) }}">
                                                            @csrf
                                                            <input type="submit"
                                                                class="btn btn-sm {{ ($order->is_aproved === null) ? ('btn-primary') : ('btn-warning disabled') }}"
                                                                 value="@if($order->is_aproved === null)Approve @elseif($order->is_aproved == true)Approved @else Declined @endif">
                                                        </form>
                                                        <form method="POST" class="d-inline"
                                                            action="{{ route('decline-order', $order) }}">
                                                            @csrf
                                                            <input type="submit"
                                                                class="btn btn-sm {{ $order->is_aproved === null ? 'btn-danger' : 'btn-warning d-none' }}"
                                                                value="{{ $order->is_aproved === null ? 'Decline' : 'Approved' }}">
                                                        </form>
                                                        {{-- <a href="" class="btn btn-sm btn-primary">Approve</a> --}}
                                                    </td>
                                                    <td class="text-center">
                                                        <form method="POST" class="d-inline"
                                                            action="{{ route('approve-delivery', $order) }}">
                                                            @csrf
                                                            <input type="submit"
                                                                class="btn btn-sm {{ $order->is_delivered === null ? 'btn-primary' : 'btn-warning disabled' }}"
                                                                value="{{ $order->is_delivered === false || $order->is_delivered === null ? 'Deliver' : 'Declined' }}">
                                                        </form>
                                                        <form method="POST" class="d-inline"
                                                            action="{{ route('decline-delivery', $order) }}">
                                                            @csrf
                                                            <input type="submit"
                                                                class="btn btn-sm {{ $order->is_delivered === null ? 'btn-danger' : 'btn-warning d-none' }}"
                                                                value="{{ $order->is_delivered === false || $order->is_delivered === null ? 'Decline' : 'Delivered' }}">
                                                        </form>
                                                        {{-- <a href="" class="btn btn-sm btn-primary">Approve</a> --}}
                                                    </td>
                                                @endif
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
