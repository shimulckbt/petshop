@extends('guest.layouts.app')
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">

                    @include('guest.layouts.shop._breadcrumbs')
                    @include('guest.layouts.shop._categories-sidebar')

                    <div class="col-lg-9 order-1 order-lg-2">
                        <div id="productMain" class="row">
                            <div class="col-md-6">
                                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                                    <div class="item"> <img src="{{ asset('storage/' . $product->image->image) }}"
                                            alt="" class="img-fluid">
                                    </div>
                                </div>
                                {{-- <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon-->
                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div> --}}
                                <!-- /.ribbon-->
                            </div>
                            <div class="col-md-6">
                                <div class="box">
                                    @include('guest.layouts.shop._cart-notification')
                                    <h1 class="text-center">{{ $product->name }}</h1>
                                    <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product
                                            details, material &amp; care and sizing</a></p>
                                    <p class="price">{{ $product->unit_price_selling }} BDT</p>
                                    <p class="text-center buttons">
                                        @if (!$product->stock <= 0)
                                            <a href="{{ route('add-to-cart', $product) }}" class="btn btn-primary"><i
                                                    class="fa fa-shopping-cart"></i> Add to cart</a>
                                        @else
                                            <a class="btn btn-warning disabled"><i class="fa fa-shopping-cart"></i> Out of
                                                stock</a>
                                        @endif
                                        <a href="{{ route('addWish', $product->id) }}" class="btn btn-outline-primary"><i
                                                class="fa fa-heart"></i> Add to wishlist</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="details" class="box">
                            <p></p>
                            <h4><b>Product details</b></h4>
                            <p><i>Breed (Brand): </i><a
                                    href="{{ route('breed', $product->productSubSubCategory->id) }}">{{ $product->productSubSubCategory->name }}</a>
                            </p>
                            <hr>
                            <p>{{ $product->long_description }}</p>
                            <hr>
                            @include('guest.layouts.shop._social')
                        </div>
                    </div>
                    <!-- /.col-md-9-->
                </div>
            </div>
        </div>
    </div>
@endsection
