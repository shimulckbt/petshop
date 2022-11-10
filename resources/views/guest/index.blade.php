@extends('guest.layouts.app')
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="main-slider" class="owl-carousel owl-theme">
                            @foreach (\App\Models\Slider::where('status', 1)->orderBy('id', 'DESC')->limit(5)->get() as $slider)
                                <div class="item"><img src="{{ asset($slider->slider_img) }}" alt=""
                                        class="img-fluid"></div>
                            @endforeach
                        </div>
                        <!-- /#main-slider-->
                    </div>
                </div>
            </div>
            <!--
                                                                                                                                                                *** ADVANTAGES HOMEPAGE ***
                                                                                                                                                                _________________________________________________________
                                                                                                                                                                -->
            <div id="advantages">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                                <div class="icon"><i class="fa fa-heart"></i></div>
                                <h3><a href="#">We love our customers</a></h3>
                                <p class="mb-0">We are known to provide best possible service ever</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                                <div class="icon"><i class="fa fa-tags"></i></div>
                                <h3><a href="#">Best prices</a></h3>
                                <p class="mb-0">You can check that the height of the boxes adjust when longer text like
                                    this one is used in one of them.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                                <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                                <h3><a href="#">100% satisfaction guaranteed</a></h3>
                                <p class="mb-0">Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row-->
                </div>
                <!-- /.container-->
            </div>
            <!-- /#advantages-->
            <!-- *** ADVANTAGES END ***-->
            <!--
                                                                                                                                                                *** HOT PRODUCT SLIDESHOW ***
                                                                                                                                                                _________________________________________________________
                                                                                                                                                                -->
            <div id="hot">
                <div class="box py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="mb-0">Pets</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="product-slider owl-carousel owl-theme">
                        @foreach ($products = \App\Models\Product\Product::where('product_category_id', 1)->where('status', 1)->with('image')->latest()->get() as $product)
                            <div class="item">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front"><a href="{{ route('detail', $product) }}"><img
                                                        src="{{ asset('storage/' . $product->image->image) }}"
                                                        alt="" class=" img-fluid"></a></div>
                                            <div class="back"><a href="{{ route('detail', $product) }}"><img
                                                        src="{{ asset('storage/' . $product->image->image) }}"
                                                        alt="" class=" img-fluid"></a></div>
                                        </div>
                                    </div><a href="{{ route('detail', $product) }}" class="invisible"><img
                                            src="{{ asset('storage/' . $product->image->image) }}" alt=""
                                            class=" img-fluid"></a>
                                    <div class="text">
                                        <h3><a href="{{ route('detail', $product) }}">{{ $product->name }}</a></h3>
                                        <p class="price text-danger font-weight-bold tex-sm" style="font-size: 1rem;">
                                            Price: {{ $product->unit_price_selling }} BDT
                                        </p>
                                    </div>
                                </div>
                                <!-- /.product-->
                            </div>
                        @endforeach
                        <!-- /.product-slider-->
                    </div>
                    <!-- /.container-->
                </div>
                <!-- /#hot-->
                <!-- *** HOT END ***-->
            </div>

            <div id="hot">
                <div class="box py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="mb-0">Foods for Pets</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="product-slider owl-carousel owl-theme">
                        @foreach ($products = \App\Models\Product\Product::where('product_category_id', 2)->where('status', 1)->with('image')->latest()->get() as $product)
                            <div class="item">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front"><a href="{{ route('detail', $product) }}"><img
                                                        src="{{ asset('storage/' . $product->image->image) }}"
                                                        alt="" class=" img-fluid"></a></div>
                                            <div class="back"><a href="{{ route('detail', $product) }}"><img
                                                        src="{{ asset('storage/' . $product->image->image) }}"
                                                        alt="" class=" img-fluid"></a></div>
                                        </div>
                                    </div><a href="{{ route('detail', $product) }}" class="invisible"><img
                                            src="{{ asset('storage/' . $product->image->image) }}" alt=""
                                            class=" img-fluid"></a>
                                    <div class="text">
                                        <h3><a href="{{ route('detail', $product) }}">{{ $product->name }}</a></h3>
                                        <p class="price text-danger font-weight-bold tex-sm" style="font-size: 1rem;">
                                            Price: {{ $product->unit_price_selling }} BDT
                                        </p>
                                    </div>
                                </div>
                                <!-- /.product-->
                            </div>
                        @endforeach
                        <!-- /.product-slider-->
                    </div>
                    <!-- /.container-->
                </div>
                <!-- /#hot-->
                <!-- *** HOT END ***-->
            </div>

            <div id="hot">
                <div class="box py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="mb-0">Accessories for Pets</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="product-slider owl-carousel owl-theme">
                        @foreach ($products = \App\Models\Product\Product::where('product_category_id', 3)->where('status', 1)->with('image')->latest()->get() as $product)
                            <div class="item">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front"><a href="{{ route('detail', $product) }}"><img
                                                        src="{{ asset('storage/' . $product->image->image) }}"
                                                        alt="" class=" img-fluid"></a></div>
                                            <div class="back"><a href="{{ route('detail', $product) }}"><img
                                                        src="{{ asset('storage/' . $product->image->image) }}"
                                                        alt="" class=" img-fluid"></a></div>
                                        </div>
                                    </div><a href="{{ route('detail', $product) }}" class="invisible"><img
                                            src="{{ asset('storage/' . $product->image->image) }}" alt=""
                                            class=" img-fluid"></a>
                                    <div class="text">
                                        <h3><a href="{{ route('detail', $product) }}">{{ $product->name }}</a></h3>
                                        <p class="price text-danger font-weight-bold tex-sm" style="font-size: 1rem;">
                                            Price: {{ $product->unit_price_selling }} BDT
                                        </p>
                                    </div>
                                </div>
                                <!-- /.product-->
                            </div>
                        @endforeach
                        <!-- /.product-slider-->
                    </div>
                    <!-- /.container-->
                </div>
                <!-- /#hot-->
                <!-- *** HOT END ***-->
            </div>
            <!--
                                                                                                                                                                *** GET INSPIRED ***
                                                                                                                                                                _________________________________________________________
                                                                                                                                                                -->

            <!-- *** GET INSPIRED END ***-->
            <!--
                                                                                                                                                                *** BLOG HOMEPAGE ***
                                                                                                                                                                _________________________________________________________
                                                                                                                                                                -->


            <!-- /.container-->
            <!-- *** BLOG HOMEPAGE END ***-->
        </div>
    </div>
@endsection
