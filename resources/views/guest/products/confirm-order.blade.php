@extends('guest.layouts.app')
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    @include('guest.layouts.shop._breadcrumbs')
                    <div id="checkout" class="col-lg-9">
                        <div class="box">
                            <form method="POST" action="{{ route('confirm-order') }}">
                                @csrf
                                <h1>Checkout - Order review</h1>
                                <div class="nav flex-column flex-sm-row nav-pills"><a href="checkout1.html"
                                        class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">
                                        </i>Address</a><a href="checkout2.html"
                                        class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck"> </i>Delivery
                                        Method</a><a href="checkout3.html" class="nav-link flex-sm-fill text-sm-center"> <i
                                            class="fa fa-money"> </i>Payment Method</a><a href="#"
                                        class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-eye"> </i>Order
                                        Review</a></div>
                                <div class="content">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Product</th>
                                                    <th>Quantity</th>
                                                    <th>Unit price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($productsInCart as $cart)
                                                    <tr>
                                                        <td><a href="{{ route('detail', $cart->product) }}"><img
                                                                    src="{{ asset('storage/' . $cart->product->image->image) }}"
                                                                    alt="White Blouse Armani"></a></td>
                                                        <td><a
                                                                href="{{ route('detail', $cart->product) }}">{{ $cart->product->name }}</a>
                                                        </td>
                                                        <td>{{ $cart->qty }}</td>
                                                        <td>{{ $cart->unit_price }} BDT</td>
                                                        <td>{{ $cart->total_price }} BDT</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5">Total</th>
                                                    <th>{{ $subTotalPrice }} BDT</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive-->
                                </div>
                                <!-- /.content-->
                                <div class="box-footer d-flex justify-content-between"><a
                                        href="{{ route('payement-method') }}" class="btn btn-outline-secondary"><i
                                            class="fa fa-chevron-left"></i>Back to payment
                                        method</a>
                                    <button type="submit" class="btn btn-primary">Place an order<i
                                            class="fa fa-chevron-right"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-->
                    </div>
                    @include('guest.layouts.shop._order-summery')
                </div>
            </div>
        </div>
    </div>
@endsection
