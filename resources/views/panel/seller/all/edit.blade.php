@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Change Seller Informations</h1>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-success alert-danger fade show" role="alert">
                                <strong>{{ session('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('seller.update', $seller->id) }}">
                            @csrf

                            {{-- General Information Form --}}

                            <div class="row">
                                <div class="col-xl-6 col-md-12 mb-4">
                                    {{-- <div class="form-group">
                                        <label for="registration-type">Registration Type</label>

                                        <select id="role_id" type="text"
                                            class="form-control @error('role_id') is-invalid @enderror" name="role_id"
                                            value="{{ old('role_id') }}" required autocomplete="role_id" autofocus>
                                            <option selected>{{ $seller->role->name }}</option>
                                        </select>

                                        @error('role_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input id="first_name" type="text"
                                            class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                            value="{{ old('first_name', $seller->first_name) }}" autocomplete="first_name"
                                            autofocus>

                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input id="last_name" type="text"
                                            class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                            value="{{ old('last_name', $seller->last_name) }}" autocomplete="last_name"
                                            autofocus>

                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email', $seller->email) }}" autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="password">Password</label>

                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            value="{{ old('password') }}"  autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i>
                                        Update</button>
                                </div>

                                {{-- Seller Details Form --}}

                                <div class="col-xl-6 col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="skill_type">Skill Type</label>
                                        <input id="skill_type" type="text"
                                            class="form-control @error('skill_type') is-invalid @enderror" name="skill_type"
                                            value="{{ old('skill_type', isset($seller->sellerDetail->skill_type) ? $seller->sellerDetail->skill_type : 'Null') }}"
                                            autocomplete="skill_type" autofocus>
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
                                            <option
                                                value="{{ old('ownership_type', isset($seller->sellerDetail->ownership_type) ? $seller->sellerDetail->ownership_type : 'Null') }}">
                                                {{ old('ownership_type', isset($seller->sellerDetail->ownership_type) ? $seller->sellerDetail->ownership_type : 'Null') }}
                                            </option>
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
                                        <input id="working_experience" type="number"
                                            class="form-control @error('working_experience') is-invalid @enderror"
                                            name="working_experience"
                                            value="{{ old('working_experience', isset($seller->sellerDetail->working_experience) ? $seller->sellerDetail->working_experience : 'Null') }}">
                                        @error('working_experience')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input id="phone_number" type="phone_number"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            name="phone_number"
                                            value="{{ old('phone_number', isset($seller->sellerDetail->phone_number) ? $seller->sellerDetail->phone_number : 'Null') }}"
                                            autocomplete="phone_number">
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nid_number">NID Number</label>
                                        <input id="nid_number" type="nid_number"
                                            class="form-control @error('nid_number') is-invalid @enderror" name="nid_number"
                                            value="{{ old('nid_number', isset($seller->sellerDetail->nid_number) ? $seller->sellerDetail->nid_number : 'Null') }}"
                                            autocomplete="nid_number">
                                        @error('nid_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nid_number">Your Address</label>
                                        <textarea name="adsress" id="adsress" cols="" rows="3"
                                            class="form-control @error('adsress') is-invalid @enderror">{{ old('adsress', isset($seller->sellerDetail->adsress) ? $seller->sellerDetail->adsress : 'Null') }}</textarea>
                                        @error('adsress')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i>
                                        Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
