@extends('panel.layouts.app')
@section('content')
<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Change Profile Picture</h1>
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

               <img class="rounded-circle" style="height:180px; width: 180px;" src="{{(!empty($profilePhoto))?url($profilePhoto):url('images/no_image.jpg')}}" height="100%" width="100%" alt=""><br>

               <form action="{{route('profilePhotoChangeRequestSubmit')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                     <label for="profile_photo" class="form-label mt-2">Upload Photo<span class="text-danger">*</span></label>

                     <input type="file" name="profile_photo" value="{{ old('profile_photo') }}" class="form-control" id="profile_photo">
                  </div>
                  @error('profile_photo')
                  <div class="form-group">
                     <h1 class="h6 pl-3 text-danger" role="alert">{{$message}}</h1>
                  </div>
                  @enderror
                  <img src="" id="pp">
                  <div>
                     <button type="submit" class="btn btn-rounded btn-dark">Change Profile Picture</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

</div>

@endsection