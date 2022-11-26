@extends('guest.layouts.app')
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div id="productMain" class="row">
                        <div class="col-md-12">
                            <div data-slider-id="1" class="owl-carousel shop-detail-carousel" >
                                <div class="item"> <img style="height: 400px" src="{{ isset($productSubSubCategory->image) ? asset('storage/' . $productSubSubCategory->image) : 'https://via.placeholder.com/600x200.png?text=NO+IMAGE' }}" alt="" class="img-fluid" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="details" class="box">
                        <p></p>
                        <h4><b>Breed/Brand details</b></h4>
                        <hr>
                        <p>Name: {{ $productSubSubCategory->name }}</p>
                        <hr>
                        <p>Description: {{ isset($productSubSubCategory->description) ? $productSubSubCategory->description : 'N/A'}}</p>
                        <hr>
                        @include('guest.layouts.shop._social')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
