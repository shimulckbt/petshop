@extends('guest.layouts.app')
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">

                    @include('guest.layouts.shop._breadcrumbs')
                    @include('guest.layouts.shop._categories-sidebar')

                    <div class="col-lg-9">
                        <div class="row products">
                            <!-- /.products-->
                            @foreach ($allActiveProducts as $product)
                                <div class="col-lg-4 col-md-6">
                                    <div class="product">
                                        @include('guest.layouts.shop._cart-notification')
                                        <div class="flip-container">
                                            <div class="flipper">
                                                <div class="front"><a href="#"><img
                                                            src="{{ asset('storage/' . $product->image->image) }}"
                                                            alt="" class="img-fluid"></a>
                                                </div>
                                                <div class="back"><a href="#"><img
                                                            src="{{ asset('storage/' . $product->image->image) }}"
                                                            alt="" class="img-fluid"></a>
                                                </div>
                                            </div>
                                        </div><a href="#" class="invisible"><img
                                                src="{{ asset('storage/' . $product->image->image) }}" alt=""
                                                class="img-fluid"></a>
                                        <div class="text-center">
                                            <h3 class="p-0"><a class="text-decoration-none"
                                                    href="{{ route('detail', $product) }}">{{ $product->name }}</a></h3>
                                            <p class="p-0 mb-0">
                                                <del></del>TK {{ $product->unit_price_selling }}
                                            </p>
                                            <p class="text-success text-center p-0">4 stars</p>
                                            <p class="buttons"><a href="{{ route('detail', $product) }}"
                                                    class="btn btn-outline-secondary">View
                                                    detail</a>
                                                @if (!$product->stock <= 0)
                                                    <a href="{{ route('add-to-cart', $product) }}"
                                                        class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to
                                                        cart</a>
                                                @else
                                                    <a class="btn btn-warning disabled"><i
                                                            class="fa fa-shopping-cart"></i>Out of stock</a>
                                                @endif
                                            </p>
                                        </div>
                                        <!-- /.text-->
                                    </div>
                                    <!-- /.product            -->
                                </div>
                            @endforeach
                            <!-- /.products-->
                        </div>
                        <div class="pages">
                            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                <ul class="pagination">
                                    <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span
                                                aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                                    <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span
                                                aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /.col-lg-9-->
                </div>
            </div>
        </div>
    </div>
@endsection
