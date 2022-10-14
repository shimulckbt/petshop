@extends('guest.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                {{-- <img src="/banner/online-medicine-concept_160901-152.jpg" class="img-fluid" style="border:1px solid #ccc;"> --}}
                @foreach ($sellers as $skill)
                    <a href="# ">
                        <button class="btn btn-primary mb-2 w-100" style="cursor: pointer">
                            {{ $skill->user->sellerDetail->skill_type }}</button></a>
                @endforeach
            </div>
            <hr>
            <!--Search seller-->
            <div class="col-md-10">
                <form action="{{ route('services.index') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header text-success font-bold">Find Expertise</div>
                            <div class="card-body ps-0 ms-0">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" name="date" style="cursor:pointer; !important;"
                                            class="form-control datetimepicker-input" id="datepicker"
                                            data-toggle="datetimepicker" data-target="#datepicker"
                                            placeholder="Enter {{ date('Y-m-d') }}" readonly>

                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary" type="submit">Find Expertise</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--display Sellers-->
                <div class="card">
                    <div class="card-body">
                        <div class="card-header text-success font-bold"> Expertise </div>
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
                                        {{-- {{ dd($seller->user_id, $seller->date) }} --}}
                                        <tr class="text-center">
                                            {{-- <th scope="row">1</th> --}}
                                            <td class="align-middle">
                                                <img src="{{ isset($seller->user->profile_photo) ? asset($seller->user->profile_photo) : asset('images/no_image.jpg') }}"
                                                    width="100px" style="border-radius: 50%;">
                                            </td>
                                            <td class="align-middle">
                                                {{ $seller->user->first_name }} {{ $seller->user->last_name }}
                                            </td>
                                            <td class="align-middle">
                                                {{ isset($seller->user->sellerDetail->skill_type) ? $seller->user->sellerDetail->skill_type : '' }}
                                            </td>
                                            <td class="align-middle">
                                                <a
                                                    href="{{ route('create.appointment', [$seller->user_id, $seller->date]) }}">
                                                    {{-- <a
                                                    href="{{ route('create.appointment', [$seller->user_id, $seller->date]) }}"> --}}
                                                    <button class="btn btn-primary">Book Appointment</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="4" class="text-center text-danger">No expertise available today</td>
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
        var dateToday = new Date();
        $(document).ready(function() {
            $("#datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
            });
        })
    </script>
@endsection
