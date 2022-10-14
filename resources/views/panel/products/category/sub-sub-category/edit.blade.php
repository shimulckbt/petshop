@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Edit Category
                                </div>
                                <div class="mb-0 mt-2">
                                    <a class="btn btn-sm btn-primary" href="{{ route('subSubCategory.create') }}">&#8678; Go
                                        Back</a>
                                </div>
                                <div class="row">
                                    <div class="col-8 mb-4">
                                        <div class="h5 mb-0 mt-4 font-weight-bold text-gray-800">
                                            <div id="message" class="d-none"></div>
                                            <form id="addProduct"
                                                action="{{ route('subSubCategory.update', $productSubSubCategory) }}"
                                                method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleProductName">Brand/Breed Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        id="exampleProductName" placeholder="Category Name"
                                                        value="{{ old('name', $productSubSubCategory->name) }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleProductName">Description</label>
                                                    <input type="text" name="description" class="form-control"
                                                    id="exampleProductName" placeholder="Description"
                                                    value="{{ old('description', $productSubSubCategory->description) }}">
                                                    @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleProductName">Image</label>
                                                    <input type="file" name="image" class="form-control"
                                                        id="exampleProductimage" >
                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
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