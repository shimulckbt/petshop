@extends('guest.layouts.app')
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    @include('guest.layouts.shop._breadcrumbs')
                    <div id="checkout" class="col-lg-9">
                        <div class="box">
                            <form method="GET" action="{{ route('checkout-address') }}">
                                @csrf
                                <h1>Checkout - Address</h1>
                                <div class="nav flex-column flex-md-row nav-pills text-center"><a
                                        href="{{ route('checkout-address') }}" class="nav-link flex-sm-fill text-sm-center">
                                        <i class="fa fa-map-marker">
                                        </i>Address</a><a href="#"
                                        class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-truck">
                                        </i>Delivery Method</a><a href="#"
                                        class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money">
                                        </i>Payment Method</a><a href="#"
                                        class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">
                                        </i>Order Review</a></div>
                                <div class="content py-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstname">Firstname</label>
                                                <input id="firstname" name="first_name" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastname">Lastname</label>
                                                <input id="lastname" name="last_name" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input id="address" name="address" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input id="phone" name="phone" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" name="email" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                </div>
                                <div class="box-footer d-flex justify-content-between"><a href="{{ route('view-cart') }}"
                                        class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to
                                        Basket</a>
                                    <button type="submit" class="btn btn-primary">Continue to Delivery Method<i
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
