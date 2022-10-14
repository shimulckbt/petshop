@extends('guest.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4>Expertise Information</h4>
                        <img src="{{ isset($user->profile_photo) ? asset($user->profile_photo) : asset('images/no_image.jpg') }}"
                            width="100px" style="border-radius: 50%;" class="mb-3">
                        <br>
                        <p class="lead"> Name: {{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</p>
                        <p class="lead"> Ownership: {{ $user->sellerDetail->ownership_type }}</p>
                        <p class="lead"> Specialist: {{ $user->sellerDetail->skill_type }}</p>
                        <p class="lead"> Experience: {{ $user->sellerDetail->working_experience }} Years</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach

                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

                @if (Session::has('errmessage'))
                    <div class="alert alert-danger">
                        {{ Session::get('errmessage') }}
                    </div>
                @endif

                <form action="{{ route('booking.appointment') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">Available Date: {{ $date }}</div>
                        {{-- {{ dd($date) }} --}}
                        <div class="card-body text-center">
                            <div class="row">
                                @if ($times->count() > 0)
                                    @foreach ($times as $time)
                                        <div class="col-md-3">
                                            <label class="btn btn-outline-primary">
                                                <input type="radio" name="time" value="{{ $time->time }}">
                                                <span>{{ $time->time }}</span>
                                            </label>
                                        </div>

                                        <input type="hidden" name="sellerId" value="{{ $seller_id }}">
                                        <input type="hidden" name="appointmentId" value="{{ $time->appointment_id }}">
                                        <input type="hidden" name="date" value="{{ $date }}">
                                    @endforeach
                                @else
                                    <span class="m-auto text-danger">Appointment time has not been created</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if (Auth::check() && auth()->user()->role->name === 'User')
                            <button type="submit" class="btn btn-success" style="width: 100%;">Book Appointment</button>
                        @elseif (!Auth::check())
                            <p class="text-danger">Please login to make an appointment</p>
                            <a href="/login">Login</a> |
                            <a href="/register">Register</a>
                        @endif

                        {{-- @if (Auth::check() && auth()->user()->role->name === 'Admin')
                            <p class="text-danger">Admin can not book appointment</p>
                        @endif --}}
                    </div>
                </form>
            </div>
            {{-- <div class="col-md-9">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach

                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

                @if (Session::has('errmessage'))
                    <div class="alert alert-danger">
                        {{ Session::get('errmessage') }}
                    </div>
                @endif

                <form action="{{ route('booking.appointment') }}" method="post">@csrf
                    <div class="card">
                        <div class="card-header lead">{{ $date }}</div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($times as $time)
                                    <div class="col-md-3">
                                        <label class="btn btn-outline-primary">
                                            <input type="radio" name="time" value="{{ $time->time }}">
                                            <span>{{ $time->time }}
                                            </span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="doctorId" value="{{ $doctor_id }}">
                                    <input type="hidden" name="appointmentId" value="{{ $time->appointment_id }}">
                                    <input type="hidden" name="date" value="{{ $date }}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if (Auth::check())
                            <button type="submit" class="btn btn-success" style="width: 100%;">Book Appointment</button>
                        @else
                            <p>Please login to make an appointment</p>
                            <a href="/register">Register</a>
                            <a href="/login">Login</a>
                        @endif
                    </div>
                </form>
            </div> --}}
        </div>
    </div>
@endsection
