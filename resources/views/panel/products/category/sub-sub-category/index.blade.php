@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Sub-categories (Brands/Breeds)</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Add New Sub-category (Brand/Breed)
                                </div>
                                <div class="mb-0 mt-2">
                                    <a class="btn btn-sm btn-primary" href="{{ route('categories.index') }}">&#8678; Go
                                        Back</a>
                                </div>
                                <div class="h5 mb-0 mt-4 font-weight-bold text-gray-800">
                                    <form id="addSubSubCategory">
                                        <div class="form-group">
                                            <label for="exampleCategory">Select Shop</label>
                                            <select class="form-control" aria-label="Select Shop" id="exampleCategory"
                                                name="shop">
                                                <option selected disabled>Select Shop</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSubCategory">Select Category</label>
                                            <select class="form-control" aria-label="Select Category"
                                                id="exampleSubCategory" name="category">
                                                <option selected disabled>Select Category</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSubSubCategory">Enter Brand/Breed</label>
                                            <input type="text" name="brand_or_breed" class="form-control"
                                                id="exampleSubSubCategory" placeholder="Brand/Breed">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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
            $('select[name="shop"]').on("change", function() {
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
                            $('select[name="category"]').empty().append(
                                '<option selected disabled>Select Category</option>'
                            );
                            $.each(data.data, function(key, value) {
                                $('select[name="category"]').append(
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

            $('#addSubSubCategory').submit(function(e) {
                e.preventDefault();
                var data = $('#addSubSubCategory').serialize();
                // For POST methods need token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '{{ route('storeSubSubCategories') }}',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'Success') {
                            $('#addSubSubCategory')[0].reset();
                        }
                    }
                });
            });
        });
    </script>
@endsection
