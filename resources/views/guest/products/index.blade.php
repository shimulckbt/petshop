@extends('guest.layouts.app')
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item active">Shop</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <div class="card sidebar-menu mb-4">
                            <div class="card-header">
                                <h3 class="h4 card-title">Shop</h3>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column category-menu">
                                    <li><a href="#" class="nav-link">Pets</a>
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="nav-link"></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="nav-link active">Pet Foods</a>
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="nav-link"></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="nav-link">Pet Accessories</a>
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="nav-link"></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row products">
                          <!-- /.products-->
                          @foreach ($allActiveProducts as $product)  
                          <div class="col-lg-4 col-md-6">
                              <div class="product">
                                  <div class="flip-container">
                                      <div class="flipper">
                                          <div class="front"><a href="#"><img src="{{ asset('storage/' . $product->image->image) }}"
                                                      alt="" class="img-fluid"></a></div>
                                          <div class="back"><a href="#"><img src="{{ asset('storage/' . $product->image->image) }}"
                                                      alt="" class="img-fluid"></a></div>
                                      </div>
                                  </div><a href="#" class="invisible"><img src="{{ asset('storage/' . $product->image->image) }}" alt=""
                                          class="img-fluid"></a>
                                  <div class="text">
                                      <h3><a href="#">{{ $product->name }}</a></h3>
                                      <p class="price">
                                          <del></del>TK {{ $product->unit_price_selling }}
                                      </p>
                                      <p class="buttons"><a href="#" class="btn btn-outline-secondary">View
                                              detail</a><a href="#" class="btn btn-primary"><i
                                                  class="fa fa-shopping-cart"></i>Add to cart</a></p>
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
                                    <li class="page-item"><a href="#" aria-label="Previous"
                                            class="page-link"><span aria-hidden="true">«</span><span
                                                class="sr-only">Previous</span></a></li>
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
