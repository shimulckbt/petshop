@extends('guest.layouts.app')
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    @include('guest.layouts.shop._breadcrumbs')
                    <div id="checkout" class="col-lg-9">
                        <div class="box">
                            <form method="GET" action="{{ route('delivery-method') }}">
                                @csrf
                                <h1>Checkout - Delivery method</h1>
                                <div class="nav flex-column flex-sm-row nav-pills"><a href="{{ route('checkout-address') }}"
                                        class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">
                                        </i>Address</a><a href="{{ route('delivery-method') }}"
                                        class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck"> </i>Delivery
                                        Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled">
                                        <i class="fa fa-money">
                                        </i>Payment Method</a><a href="#"
                                        class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">
                                        </i>Order Review</a></div>
                                <div class="content py-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="box shipping-method">
                                                <h4>Pick Up</h4>
                                                <p>Come to our pick up point, and get product hand to hand.</p>
                                                <div class="box-footer text-center">
                                                    <input type="radio" name="delivery_method" value="pick-up">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box shipping-method">
                                                <h4>Home Delivery</h4>
                                                <p>Get it delivered to your home, whithin 2 working days.</p>
                                                <div class="box-footer text-center">
                                                    <input type="radio" name="delivery_method" value="home-delivery">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer d-flex justify-content-between"><a
                                        href="{{ route('checkout-address') }}" class="btn btn-outline-secondary"><i
                                            class="fa fa-chevron-left"></i>Back to address</a>
                                    <button type="submit" class="btn btn-primary">Continue to Payment Method<i
                                            class="fa fa-chevron-right"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
