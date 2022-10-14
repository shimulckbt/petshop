@extends('guest.layouts.app')
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    @include('guest.layouts.shop._breadcrumbs')
                    <div id="basket" class="col-lg-9">
                        <div class="box">
                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have {{ session('cartCount') ?? 0 }} items in cart item(s) in
                                your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Qty</th>
                                            <th>Unit</th>
                                            <th colspan="2">Total</th>
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
                                                <td>
                                                    <form class="form-inline" method="POST"
                                                        action="{{ route('update-cart', $cart) }}">
                                                        @csrf
                                                        <input type="number" name="qty" value="{{ $cart->qty }}"
                                                            class="mr-2 px-2 form-control">
                                                        <button type="submit" class="btn btn-outline-secondary"><i
                                                                class="fa fa-refresh"></i></button>
                                                    </form>
                                                </td>
                                                <td>{{ $cart->unit_price }} BDT</td>
                                                <td>{{ $cart->total_price }} BDT</td>
                                                <td><a href="{{ route('delete-cart', $cart) }}"><i class="fa fa-trash-o"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">{{ $subTotalPrice }} BDT</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.table-responsive-->
                            <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                                <div class="left"><a href="{{ route('shop') }}" class="btn btn-outline-secondary"><i
                                            class="fa fa-chevron-left"></i> Continue shopping</a></div>
                                <div class="right">

                                    <a href="{{ route("proceed-checkout") }}" class="btn btn-primary {{ session('cartCount') == 0 ? 'disabled' : '' }}">Proceed to checkout <i
                                            class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
