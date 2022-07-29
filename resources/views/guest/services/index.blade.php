@extends('guest.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                {{-- <img src="/banner/online-medicine-concept_160901-152.jpg" class="img-fluid" style="border:1px solid #ccc;"> --}}
                @foreach ($sellers as $skill)
                    <h4>{{ $skill->user->sellerDetail->skill_type }}</h4>
                @endforeach
            </div>
            <hr>
            <!--Search seller-->
            <div class="col-md-10">
                <form action="{{ url('/') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">Find Sellers</div>
                            <div class="card-body ps-0 ms-0">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" name="date"
                                            style="cursor:pointer; color: rgb(47, 42, 42) !important;"
                                            class="form-control datetimepicker-input" id="datepicker"
                                            data-toggle="datetimepicker" data-target="#datepicker"
                                            placeholder="Enter {{ date('Y-m-d') }}" readonly>

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
                                    <tr class="text-center">
                                        {{-- <th>#</th> --}}
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Expertise</th>
                                        <th>Book Appointment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sellers as $seller)
                                        <tr>
                                            {{-- <th scope="row">1</th> --}}
                                            <td class="text-center">
                                                <img src="{{ isset($seller->user->profile_photo) ? asset($seller->user->profile_photo) : asset('images/no_image.jpg') }}"
                                                    width="100px" style="border-radius: 50%;">
                                            </td>
                                            <td class="text-center">
                                                {{ $seller->user->first_name }} {{ $seller->user->last_name }}
                                            </td>
                                            <td class="text-center">
                                                {{ isset($seller->user->sellerDetail->skill_type) ? $seller->user->sellerDetail->skill_type : '' }}
                                            </td>
                                            <td class="text-center">
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        })
    </script>
@endsection
