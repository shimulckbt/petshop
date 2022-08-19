@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Categories</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Add New Category
                                </div>
                                <div class="mb-0 mt-2">
                                    <a class="btn btn-sm btn-primary" href="{{ route('categories.index') }}">&#8678; Go
                                        Back</a>
                                </div>
                                <div class="h5 mb-0 mt-4 font-weight-bold text-gray-800">
                                    <div id="message" class="d-none"></div>
                                    <form id="addSubCategory">
                                        <div class="form-group">
                                            <label for="exampleCategory">Select Shop</label>
                                            <select class="form-control" aria-label="Select Shop" id="exampleCategory"
                                                name="product_category_id">
                                                <option selected disabled>Select Shop</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSubCategory">Enter Category</label>
                                            <input type="text" name="name" class="form-control"
                                                id="exampleSubCategory" placeholder="Category">
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
            $('#addSubCategory').submit(function(e) {
                e.preventDefault();
                var data = $('#addSubCategory').serialize();
                // For POST methods need token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ route('storeSubCategories') }}",
                    data: data,
                    dataType: 'json',
                    success: function(data, status, xhr) {
                        console.log(data);
                        console.log(status);
                        console.log(xhr);

                        if (data.status == 'success') {
                            $('#addSubCategory')[0].reset();
                            $('#message').empty().removeClass().addClass('alert alert-success').attr('role', 'alert');
                            $('#message').append(data.message);
                        } 
                    },
                    error: function(jqXhr, textStatus, errorThrown){
                        console.log(jqXhr);
                        console.log(textStatus);
                        console.log(errorThrown);
                        console.log(jqXhr.responseJSON);

                        if (jqXhr.status == 400) {
                            $('#message').empty().removeClass().addClass('alert alert-danger').attr('role', 'alert').append('<ul id="errors" class="mb-0"></ul>');;
                            $.each(jqXhr.responseJSON.message, function(key, value){
                                $('#errors').append('<li>' + value + ' 😑 </li>');
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
