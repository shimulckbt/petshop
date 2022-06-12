@extends('panel.layouts.app')
@section('content')
<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Change General Information</h1>
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

               <form method="POST" action="{{ route('changeGeneralInfoRequestSubmit') }}">
                  @csrf
                  <div class="form-group">
                     <label for="first_name">First Name</label>
                     <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name',$user->first_name) }}" required autocomplete="first_name" autofocus>

                     @error('first_name')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label for="last_name">Last Name</label>
                     <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name',$user->last_name) }}" required autocomplete="last_name" autofocus>

                     @error('last_name')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label for="email">Email</label>
                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">

                     @error('email')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>

                  <div class="">
                     <button type="submit" class="btn btn-dark"><i class="fa fa-user-md"></i> Update</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

</div>

@endsection