@extends('panel.layouts.app')
@section('content')
<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
   </div>

   <div class="row">
      <div class="col-xl-6 col-md-6 mb-4">
         <div class="card shadow mb-4">
            <div class="card-body">
               @if(session('success'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('success')}}</strong>
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
               </div>
               @endif
               @if(session('error'))
               <div class="alert alert-success alert-danger fade show" role="alert">
                  <strong>{{session('error')}}</strong>
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
               </div>
               @endif

               <form action="{{route('changePasswordRequestSubmit')}}" method="POST">
                  @csrf

                  <div class="mb-3">
                     <label for="current_password" class="form-label">Current Password<span class="text-danger">*</span></label>
                     <input type="password" name="current_password" class="form-control" id="current_password" value="{{ old('current_password') }}">
                  </div>
                  @error('current_password')
                  <div class="form-group">
                     <h1 class="h6 pl-3 text-danger" role="alert">{{$message}}</h1>
                  </div>
                  @enderror
                  <div class="mb-3">
                     <label for="password" class="form-label">New Password<span class="text-danger">*</span></label>
                     <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
                  </div>
                  @error('password')
                  <div class="form-group">
                     <h1 class="h6 pl-3 text-danger" role="alert">{{$message}}</h1>
                  </div>
                  @enderror
                  <div class="mb-3">
                     <label for="confirm_password" class="form-label">Confirm Password<span class="text-danger">*</span></label>
                     <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control" id="confirm_password">
                  </div>
                  @error('confirm_password')
                  <div class="form-group">
                     <h1 class="h6 pl-3 text-danger" role="alert">{{$message}}</h1>
                  </div>
                  @enderror
                  <div>
                     <button type="submit" class="btn btn-rounded btn-dark">Change</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

</div>

@endsection