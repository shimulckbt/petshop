@extends('guest.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                {{-- <img src="/banner/online-medicine-concept_160901-152.jpg" class="img-fluid" style="border:1px solid #ccc;"> --}}
                @foreach ($sellers as $skill)
                    <h4>{{ $skill->sellerDetail->skill_type }}</h4>
                @endforeach
            </div>
            <hr>
            <!--Search seller-->
            <div class="col-md-9">
                <form action="{{ url('/') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">Find Sellers</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" name="date" class="form-control" id="datepicker">
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary" type="submit">Find Sellers</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--display Sellers-->
                <div class="card">
                    <div class="card-body">
                        <div class="card-header"> Sellers </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Expertise</th>
                                        <th>Book Appointment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sellers as $seller)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>
                                                <img src="{{ isset($seller->profile_photo) ? asset($seller->profile_photo) : asset('images/no_image.jpg') }}"
                                                    width="100px" style="border-radius: 50%;">
                                            </td>
                                            <td>
                                                {{ $seller->first_name }} {{ $seller->lastst_name }}
                                            </td>
                                            <td>
                                                {{ $seller->sellerDetail->skill_type }}
                                            </td>
                                            <td>
                                                <a href="#">
                                                    {{-- <a
                                                    href="{{ route('create.appointment', [$seller->user_id, $seller->date]) }}"> --}}
                                                    <button class="btn btn-success">Book Appointment</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <td>No sellers available today</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
