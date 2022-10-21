@extends('guest.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Expert's Information</h4>
                        <img src="{{ isset($user->profile_photo) ? asset($user->profile_photo) : asset('images/no_image.jpg') }}"
                            width="100px" height="100px" style="border-radius: 50%;" class="mb-3">
                        <br>
                        <p class="lead text-primary" style="font-weight: 400"> Name: <span class="text-primary text-primary"
                                style="font-weight: 500">{{ ucfirst($user->first_name) }}
                                {{ ucfirst($user->last_name) }}</span></p>
                        <p class="lead text-primary" style="font-weight: 400"> Ownership:
                            <span class="text-primary text-primary"
                                style="font-weight: 500">{{ $user->sellerDetail->ownership_type }}</span>
                        </p>
                        <p class="lead text-primary" style="font-weight: 400"> Specialist: <span
                                class="text-primary text-primary"
                                style="font-weight: 500">{{ $user->sellerDetail->skill_type }}</span>
                        </p>
                        <p class="lead text-primary" style="font-weight: 400"> Experience:
                            <span class="text-primary text-primary"
                                style="font-weight: 500">{{ $user->sellerDetail->working_experience }}
                                Years</span>
                        </p>
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
                        <div class="card-header text-primary" style="font-weight: 500">Available Date:
                            <span style="font-weight: 600">{{ $date }}</span>
                        </div>
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

                        @if (Auth::check() && auth()->user()->role->name !== 'User')
                            <p class="text-danger">Only customer can book appointment</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
