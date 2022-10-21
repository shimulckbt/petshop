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
                                    <div class="item">
                                        <img src="{{ asset('storage/' . $product->image->image) }}" alt=""
                                            class="img-fluid">
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

                            @php
                                $reviewcount = App\Models\Review::where('product_id', $product->id)
                                    ->where('status', 1)
                                    ->latest()
                                    ->get();
                                $avarage = App\Models\Review::where('product_id', $product->id)
                                    ->where('status', 1)
                                    ->avg('rating');
                                
                            @endphp

                            <div class="col-md-6">
                                <div class="box">
                                    @include('guest.layouts.shop._cart-notification')
                                    <div class="text-center">
                                        <h1 class="text-center">{{ $product->name }}</h1>
                                        @if ($avarage == 0)
                                            No Rating Yet
                                        @elseif($avarage > 0 && $avarage <= 1)
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                        @elseif($avarage > 1 && $avarage <= 1.5)
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star-half-full"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                        @elseif($avarage > 1.5 && $avarage <= 2)
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                        @elseif($avarage > 2 && $avarage <= 2.5)
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star-half-full"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                        @elseif($avarage > 2.5 && $avarage <= 3)
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                        @elseif($avarage > 3 && $avarage <= 3.5)
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star-half-full"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                        @elseif($avarage > 3.5 && $avarage <= 4)
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star-o"></span>
                                        @elseif($avarage > 4 && $avarage <= 4.5)
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star-half-full"></span>
                                        @elseif($avarage > 4.5 && $avarage <= 5)
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                            <span class="text-primary fa fa-star"></span>
                                        @endif

                                        <span class="text-warning">({{ count($reviewcount) }})</span>
                                    </div>

                                    <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product
                                            details, material</a></p>
                                    <p class="text-danger text-center font-weight-bolder">
                                        Price: {{ $product->unit_price_selling }}
                                        BDT</p>
                                    <p class="text-center buttons">
                                        @if (!$product->stock <= 0)
                                            <a href="{{ route('add-to-cart', $product) }}" class="btn btn-primary"><i
                                                    class="fa fa-shopping-cart"></i> Add to cart</a>
                                        @else
                                            <a class="btn btn-warning disabled"><i class="fa fa-shopping-cart"></i> Out of
                                                stock</a>
                                        @endif
                                        <a href="#" class="btn btn-outline-primary"><i class="fa fa-heart"></i> Add to
                                            wishlist</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-success alert-danger fade show" role="alert">
                                <strong>{{ session('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif
                        <div id="details" class="box">
                            <h4 class="font-weight-bold">Short Description:</h4>
                            <p>{{ $product->short_description }}</p>
                            <hr>

                            <h4 class="font-weight-bold">Product Details:</h4>
                            <p>{{ $product->long_description }}</p>
                            <hr>

                            <h4 class="font-weight-bold">Customer Reviews:</h4>
                            <div>
                                <div>
                                    <div>
                                        <div>
                                            @php
                                                $reviews = App\Models\Review::where('product_id', $product->id)
                                                    ->latest()
                                                    ->limit(10)
                                                    ->get();
                                            @endphp
                                            <div>
                                                @foreach ($reviews as $review)
                                                    @if ($review->status == 0)
                                                    @else
                                                        <div class="pt-3">
                                                            <div class="row py-1">
                                                                <div class="col-md-6">
                                                                    <img style="border-radius: 50%"
                                                                        src="{{ isset($review->user->profile_photo) ? asset($review->user->profile_photo) : asset('images/no_image.jpg') }}"
                                                                        width="40px;" height="40px;">
                                                                    <b class="text-info text-capitalize">
                                                                        {{ $review->user->first_name }}
                                                                        {{ $review->user->last_name }}
                                                                    </b>
                                                                    @if ($review->rating == null)
                                                                    @elseif($review->rating > 0 && $review->rating <= 1)
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                    @elseif($review->rating > 1 && $review->rating <= 1.5)
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span
                                                                            class="text-warning fa fa-star-half-full"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                    @elseif($review->rating > 1.5 && $review->rating <= 2)
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                    @elseif($review->rating > 2 && $review->rating <= 2.5)
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span
                                                                            class="text-warning fa fa-star-half-full"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                    @elseif($review->rating > 2.5 && $review->rating <= 3)
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                    @elseif($review->rating > 3 && $review->rating <= 3.5)
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span
                                                                            class="text-warning fa fa-star-half-full"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                    @elseif($review->rating > 3.5 && $review->rating <= 4)
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star-o"></span>
                                                                    @elseif($review->rating > 4 && $review->rating <= 4.5)
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span
                                                                            class="text-warning fa fa-star-half-full"></span>
                                                                    @elseif($review->rating > 4.5 && $review->rating <= 5)
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                        <span class="text-warning fa fa-star"></span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <span
                                                                    class="h5 text-success text-capitalize font-weight-bold pl-5">{{ $review->summary }}</span><span
                                                                    class="data-table pl-3"><i
                                                                        class="fa fa-calendar pl-1 font-weight-bold"></i><span>
                                                                        <span
                                                                            class="pl-1 text-capitalize text-black-50">{{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <figcaption class="blockquote-footer pl-5 pt-2">
                                                                    {{ $review->comment }}
                                                                </figcaption>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="">
                                            <div class="">
                                                @guest
                                                    <p class="text-danger mt-4">To add product review, you need to
                                                        <a href="{{ route('login') }}">
                                                            <span class="text-primary">LoginFirst</span>
                                                        </a>
                                                    </p>
                                                @else
                                                    <h4 class="font-weight-bold text-capitalize">Write your own review <span
                                                            class="text-danger text-sm">
                                                            <h6 style="display: inline-block">
                                                                (Please put rating, sumary and comment
                                                                field)
                                                            </h6>
                                                        </span></h4>
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form" method="post"
                                                            action="{{ route('review.store') }}">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <table class="table mt-2">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="cell-label">&nbsp;</th>
                                                                        <th>1 star</th>
                                                                        <th>2 stars</th>
                                                                        <th>3 stars</th>
                                                                        <th>4 stars</th>
                                                                        <th>5 stars</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="pl-0">Rating <span
                                                                                class="text-danger">*</span></td>
                                                                        <td>
                                                                            <input type="radio" name="rating"
                                                                                class="radio" value="1">
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" name="rating"
                                                                                class="radio" value="2">
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" name="rating"
                                                                                class="radio" value="3">
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" name="rating"
                                                                                class="radio" value="4">
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" name="rating"
                                                                                class="radio" value="5">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" name="summary"
                                                                            class="form-control txt" id="exampleInputSummary"
                                                                            placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span
                                                                                class="text-danger">*</span></label>
                                                                        <textarea class="form-control txt txt-review" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="action text-right">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-upper">SUBMIT
                                                                    REVIEW</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                @endguest
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            @include('guest.layouts.shop._social')
                        </div>
                    </div>
                    <!-- /.col-md-9-->
                </div>
            </div>
        </div>
    </div>
@endsection
