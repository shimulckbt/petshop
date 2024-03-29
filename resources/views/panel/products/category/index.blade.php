@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Shops</div>
                                <div class="h5 mb-0 mt-2 font-weight-bold text-gray-800">
                                    <select class="form-control" aria-label="Select Shop" id="exampleCategory"
                                        name="category">
                                        <option selected disabled>Select Shop</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Categories</div>
                                <div class="mb-0 mt-2 font-weight-bold text-gray-800">
                                    <select class="form-control" aria-label="Select Category" id="exampleSubCategory"
                                        name="sub_category">
                                        <option selected disabled>Select Category</option>
                                    </select>
                                </div>
                                <div class="mb-0 mt-2">
                                    <a id="addSubCategory" class="btn btn-sm btn-primary" href="{{ route('subCategory.create') }}">Add More &#10133;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Brands / Breeds</div>
                                <div class="mb-0 mt-2 font-weight-bold text-gray-800">
                                    <select class="form-control" aria-label="Select Brand/Breed"
                                        id="exampleSubSubCategory" name="sub_sub_category">
                                        <option selected disabled>Select Brand/Breed</option>
                                    </select>
                                </div>
                                <div class="mb-0 mt-2">
                                    <a id="viewSubSubCategory" class="d-none btn btn-sm btn-primary" href="#">View Details &#128064;</a>
                                    <a id="addSubSubCategory" class="btn btn-sm btn-primary" href="{{ route('subSubCategory.create') }}">Add More &#10133;</a>
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

            // For POST methods need token
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            $('select[name="category"]').on("change", function() {
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
                            $('select[name="sub_category"]').empty().append(
                                '<option selected disabled>Select Category</option>'
                            );
                            $('select[name="sub_sub_category"]').empty().append(
                                '<option selected disabled>Select Brand/Breed</option>'
                            );
                            $('#viewSubSubCategory').addClass('d-none');
                            $.each(data.data, function(key, value) {
                                $('select[name="sub_category"]').append(
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

            $('select[name="sub_category"]').on("change", function() {
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
                            $('select[name="sub_sub_category"]').empty().append(
                                '<option selected disabled>Select Brand/Breed</option>'
                            );
                            $('#viewSubSubCategory').addClass('d-none');
                            $.each(data.data, function(key, value) {
                                $('select[name="sub_sub_category"]').append(
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
            $('select[name="sub_sub_category"]').on("change", function() {
                var subSubCategoryId = $(this).val();
                var url = '{{ route('getSubCategories','id') }}';
                url = url.replace('id', subSubCategoryId);
                console.log(url);
                // $('#viewSubSubCategory').removeClass('d-none').attr("href", url);
            });
        });
    </script>
@endsection
