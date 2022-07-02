@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Products</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Add New Product
                                </div>
                                <div class="mb-0 mt-2">
                                    <a class="btn btn-sm btn-primary" href="{{ route('products.index') }}">&#8678; Go
                                        Back</a>
                                </div>
                                <div class="row">
                                    <div class="col-8 mb-4">
                                        <div class="h5 mb-0 mt-4 font-weight-bold text-gray-800">
                                            <div id="message" class="d-none"></div>
                                            <form id="addProduct">
                                                <div class="form-group">
                                                    <label for="exampleCategory">Select Shop</label>
                                                    <select class="form-control" aria-label="Select Shop"
                                                        id="exampleCategory" name="product_category_id">
                                                        <option selected disabled>Select Shop</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleSubCategory">Select Category</label>
                                                    <select class="form-control" aria-label="Select Category"
                                                        id="exampleSubCategory" name="product_sub_category_id">
                                                        <option selected disabled>Select Category</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleSubSubCategory">Enter Brand/Breed</label>
                                                    <select class="form-control" aria-label="Select Brand/Breed"
                                                        id="exampleSubSubCategory" name="product_sub_sub_category_id">
                                                        <option selected disabled>Select Brand/Breed</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleProductName">Product Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        id="exampleProductName" placeholder="Product Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleProductNameSlug">Product Slug</label>
                                                    <input type="text" name="slug" class="form-control"
                                                        id="exampleProductNameSlug" placeholder="product-name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleShortDesc">Short Description</label>
                                                    <textarea class="form-control" id="exampleShortDesc" placeholder="Short Description" name="short_description"
                                                        rows="2"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleLongDesc">Long Description</label>
                                                    <textarea class="form-control" id="exampleLongDesc" placeholder="Long Description" name="long_description"
                                                        rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleSKU">SKU</label>
                                                    <input type="text" name="sku" class="form-control"
                                                        id="exampleSKU" placeholder="SKU">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleStock">Stock</label>
                                                    <input type="number" name="stock" class="form-control"
                                                        id="exampleStock" placeholder="0">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleUnitPriceBuying">Buying Unit Price</label>
                                                    <input type="number" name="unit_price_buying" class="form-control"
                                                        id="exampleUnitPriceBuying" placeholder="0">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleUnitPriceSelling">Selling Unit Price</label>
                                                    <input type="number" name="unit_price_selling" class="form-control"
                                                        id="exampleUnitPriceSelling" placeholder="0">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleImage">Upload Image</label>
                                                    <input type="file" class="form-control-file" id="exampleImage"
                                                        name="image">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-4">
                                        <div class="h5 mb-0 mt-4 font-weight-bold text-gray-800 text-center">
                                            Images
                                            <div class="mt-2 p-2 border rounded" id="images">
                                                <img id="previewImage" src="https://via.placeholder.com/500"
                                                    alt="placeholder" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('select[name="product_category_id"]').on("change", function() {
                var categoryId = $(this).val();
                var url = "{{ route('getSubCategories', 'id') }}";
                url = url.replace('id', categoryId);
                // console.log(url);
                if (categoryId) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product_sub_category_id"]').empty().append(
                                '<option selected disabled>Select Category</option>'
                            );
                            $('select[name="product_sub_sub_category_id"]').empty().append(
                                '<option selected disabled>Select Brand/Breed</option>'
                            );
                            $.each(data.data, function(key, value) {
                                $('select[name="product_sub_category_id"]').append(
                                    '<option value = "' +
                                    value.id +
                                    '">' +
                                    value.name +
                                    "</option>"
                                );
                            });
                        },
                    });
                } else {
                    console.log("Something went wrong :(");
                }
            });
            $('select[name="product_sub_category_id"]').on("change", function() {
                var subSubCategoryId = $(this).val();
                var url = "{{ route('getSubSubCategories', 'id') }}";
                url = url.replace('id', subSubCategoryId);
                // console.log(url);
                if (subSubCategoryId) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product_sub_sub_category_id"]').empty().append(
                                '<option selected disabled>Select Brand/Breed</option>'
                            );
                            $.each(data.data, function(key, value) {
                                $('select[name="product_sub_sub_category_id"]').append(
                                    '<option value = "' +
                                    value.id +
                                    '">' +
                                    value.name +
                                    "</option>"
                                );
                            });
                        },
                    });
                } else {
                    console.log("Something went wrong :(");
                }
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#previewImage').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#exampleImage").change(function() {
                readURL(this);
            });

            $('#addProduct').submit(function(e) {
                e.preventDefault();
                var data = new FormData($('#addProduct')[0]);
                // For POST methods need token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ route('products.store') }}",
                    data: data,
                    enctype: 'multipart/form-data',
                    processData: false,
                    cache: false,
                    contentType: false,
                    timeout: 600000,
                    success: function(data, status, xhr) {
                        // console.log(data);
                        // console.log(status);
                        // console.log(xhr);

                        if (data.status == 'success') {
                            $('#addProduct')[0].reset();
                            $('#message').empty().removeClass().addClass('alert alert-success')
                                .attr('role', 'alert');
                            $('#message').append(data.message);
                        }
                    },
                    error: function(jqXhr, textStatus, errorThrown) {
                        // console.log(jqXhr);
                        // console.log(textStatus);
                        // console.log(errorThrown);
                        // console.log(jqXhr.responseJSON);

                        if (jqXhr.status == 400) {
                            $('#message').empty().removeClass().addClass('alert alert-danger')
                                .attr('role', 'alert').append(
                                    '<ul id="errors" class="mb-0"></ul>');;
                            $.each(jqXhr.responseJSON.message, function(key, value) {
                                $('#errors').append('<li>' + value + ' 😑 </li>');
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
