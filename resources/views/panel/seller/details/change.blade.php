@extends('panel.layouts.app')
@section('content')
<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Change Details Information</h1>
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

               <form method="POST" action="{{ route('updateSellerDetails') }}">
                  @csrf
                  <div class="form-group">
                     <label for="skill_type">Skill Type</label>
                     <input id="skill_type" type="text" class="form-control @error('skill_type') is-invalid @enderror" name="skill_type" value="{{ old('skill_type',$seller->sellerDetail->skill_type) }}" required autocomplete="skill_type" autofocus>

                     @error('skill_type')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>

                  <!-- company type -->

                  <div class="form-group">
                     <label for="ownership_type">Personal/Company</label>
                     <select name="ownership_type" id="ownership_type" class="form-control">
                        <option selected disabled value="{{old('ownership_type',$seller->sellerDetail->ownership_type)}}">{{old('ownership_type',$seller->sellerDetail->ownership_type)}}</option>
                        <option value="Personal">Personal</option>
                        <option value="Company">Company</option>
                     </select>

                     @error('ownership_type')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label for="working_experience">Working Experience (Years)</label>
                     <input id="working_experience" type="number" class="form-control @error('working_experience') is-invalid @enderror" name="working_experience" value="{{ old('working_experience',$seller->sellerDetail->working_experience) }}">

                     @error('working_experience')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label for="phone_number">Phone Number</label>
                     <input id="phone_number" type="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number',$seller->sellerDetail->phone_number) }}" required autocomplete="phone_number">

                     @error('phone_number')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label for="nid_number">Phone Number</label>
                     <input id="nid_number" type="nid_number" class="form-control @error('nid_number') is-invalid @enderror" name="nid_number" value="{{ old('nid_number',$seller->sellerDetail->nid_number) }}" required autocomplete="nid_number">

                     @error('nid_number')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label for="nid_number">Your Address</label>

                     <textarea name="adsress" id="adsress" cols="" rows="3" class="form-control @error('adsress') is-invalid @enderror">{{ old('adsress',$seller->sellerDetail->adsress) }}</textarea>

                     @error('adsress')
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