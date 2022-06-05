@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <h6>Test Category</h6>
        </div>

        <!-- Content Row -->
        <div class="row">
            <h6>Test Sub Category</h6>
        </div>

        <!-- Content Row -->
        <div class="row">
            <h6>Test Brand Category</h6>
        </div>

        <!-- Content Row -->


    </div>

    <!-- <div class="container">
           <div class="row justify-content-center">
              <div class="col-md-8">
                 <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <h4>Hi I am Admin: My name is {{ Auth::user()->first_name }}</h4>
                    <div class="card-body">
                       @if (session('status'))
    <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                       </div>
    @endif

                       {{ __('You are logged in!') }}
                    </div>
                 </div>
              </div>
           </div>
        </div> -->
@endsection
