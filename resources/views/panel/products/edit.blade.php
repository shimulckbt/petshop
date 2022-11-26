@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Edit Product
                                </div>
                                <div class="mb-0 mt-2">
                                    <a class="btn btn-sm btn-primary" href="{{ route('products.index') }}">&#8678; Go
                                        Back</a>
                                </div>
                                <div class="row">
                                    <div class="col-8 mb-4">
                                        <div class="h5 mb-0 mt-4 font-weight-bold text-gray-800">
                                            <div id="message" class="d-none"></div>
                                            <form id="addProduct" action="{{ route('products.update', $product) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
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
                                                    @error('product_category_id')
                                                        <span class="text-danger font-weight-light" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleSubCategory">Select Category</label>
                                                    <select class="form-control" aria-label="Select Category"
                                                        id="exampleSubCategory" name="product_sub_category_id">
                                                        <option selected disabled>Select Category</option>
                                                    </select>
                                                    @error('product_sub_category_id')
                                                        <span class="text-danger font-weight-light" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleSubSubCategory">Enter Brand/Breed</label>
                                                    <select class="form-control" aria-label="Select Brand/Breed"
                                                        id="exampleSubSubCategory" name="product_sub_sub_category_id">
                                                        <option selected disabled>Select Brand/Breed</option>
                                                    </select>
                                                    @error('product_sub_sub_category_id')
                                                        <span class="text-danger font-weight-light" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleProductName">Product Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        id="exampleProductName" placeholder="Product Name"
                                                        value="{{ old('name', $product->name) }}">
                                                    @error('name')
                                                        <span class="text-danger font-weight-light" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleProductNameSlug">Product Slug</label>
                                                    <input type="text" name="slug" class="form-control"
                                                        id="exampleProductNameSlug" placeholder="product-name"
                                                        value="{{ old('slug', $product->slug) }}">
                                                    @error('slug')
                                                        <span class="text-danger font-weight-light" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleShortDesc">Short Description</label>
                                                    <textarea class="form-control" id="exampleShortDesc" placeholder="Short Description" name="short_description"
                                                        rows="2">{{ old('short_description', $product->short_description) }}</textarea>
                                                    @error('short_description')
                                                        <span class="text-danger font-weight-light" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleLongDesc">Long Description</label>
                                                    <textarea class="form-control" id="exampleLongDesc" placeholder="Long Description" name="long_description"
                                                        rows="3">{{ old('long_description', $product->long_description) }}</textarea>
                                                    @error('long_description')
                                                        <span class="text-danger font-weight-light" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleSKU">SKU</label>
                                                    <input type="text" name="sku" class="form-control"
                                                        id="exampleSKU" placeholder="SKU"
                                                        value="{{ old('sku', $product->sku) }}">
                                                    @error('sku')
                                                        <span class="text-danger font-weight-light" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleStock">Stock</label>
                                                    <input type="number" name="stock" class="form-control"
                                                        id="exampleStock" placeholder="0"
                                                        value="{{ old('stock', $product->stock) }}">
                                                    @error('stock')
                                                        <span class="text-danger font-weight-light" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleUnitPriceBuying">Buying Unit Price</label>
                                                    <input type="number" name="unit_price_buying" class="form-control"
                                                        id="exampleUnitPriceBuying" placeholder="0"
                                                        value="{{ old('unit_price_buying', $product->unit_price_buying) }}">
                                                    @error('unit_price_buying')
                                                        <span class="text-danger font-weight-light" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleUnitPriceSelling">Selling Unit Price</label>
                                                    <input type="number" name="unit_price_selling" class="form-control"
                                                        id="exampleUnitPriceSelling" placeholder="0"
                                                        value="{{ old('unit_price_selling', $product->unit_price_selling) }}">
                                                    @error('unit_price_selling')
                                                        <span class="text-danger font-weight-light" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleImage">Upload Image</label>
                                                    <input type="file" class="form-control-file" id="exampleImage"
                                                        name="image" value="{{ old('image', $product->image) }}">
                                                    @error('image')
                                                        <span class="text-danger font-weight-light" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- <div class="col-4 mb-4">
                                        <div class="h5 mb-0 mt-4 font-weight-bold text-gray-800 text-center">
                                            Images
                                            <div class="mt-2 p-2 border rounded" id="images">
                                                <img id="previewImage" src="https://via.placeholder.com/500"
                                                    alt="placeholder" class="img-fluid">
                                            </div>
                                        </div>
                                    </div> --}}
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
        });
    </script>
@endsection
