@extends('guest.layouts.app')
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    @include('guest.layouts.shop._breadcrumbs')
                    <div id="checkout" class="col-lg-9">
                        <div class="box">
                            <form method="GET" action="{{ route('payement-method') }}">
                                @csrf
                                <h1>Checkout - Payment method</h1>
                                <div class="nav flex-column flex-sm-row nav-pills"><a href="{{ route('checkout-address') }}"
                                        class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">
                                        </i>Address</a><a href="{{ route('delivery-method') }}"
                                        class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck"> </i>Delivery
                                        Method</a><a href="{{ route('payement-method') }}"
                                        class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-money">
                                        </i>Payment Method</a><a href="#"
                                        class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">
                                        </i>Order Review</a></div>
                                <div class="content py-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="box payment-method">
                                                <h4>Cash on delivery</h4>
                                                <p>We like it all.</p>
                                                <div class="box-footer text-center">
                                                    <input type="radio" name="payment_method" value="cash-on-delivery">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box payment-method">
                                                <h4>Online payment</h4>
                                                <p>VISA and Mastercard only.</p>
                                                <div class="box-footer text-center">
                                                    <input type="radio" name="payment_method" value="online-payment">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                </div>
                                <!-- /.content-->
                                <div class="box-footer d-flex justify-content-between"><a
                                        href="{{ route('delivery-method') }}" class="btn btn-outline-secondary"><i
                                            class="fa fa-chevron-left"></i>Back to Shipping Method</a>
                                    <button type="submit" class="btn btn-primary">Continue to Order Review<i
                                            class="fa fa-chevron-right"></i></button>
                                </div>
                            </form>
                            <!-- /.box-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
