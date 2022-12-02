@extends('guest.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <!--Search seller-->
            @include('guest.services.sidebar')
            <div class="col-md-9">
                <form action="{{ route('services.index') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" name="date" style="cursor:pointer; !important;"
                                            class="form-control datetimepicker-input" id="datepicker"
                                            data-toggle="datetimepicker" data-target="#datepicker"
                                            placeholder="Enter {{ date('Y-m-d') }}" readonly>

                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary float-right" type="submit">Find Expertise</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--display Sellers-->
                {{-- <div class="card">
                    <div class="card-body">
                        <div class="card-header text-success font-bold"> Expertise </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Expertise</th>
                                        <th>Book Appointment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sellers as $seller)
                                        <tr class="text-center">
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
                </div> --}}

                <div class="card shadow my-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" role="grid"
                                            aria-describedby="dataTable_info" style="width: 100%;" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Expertise</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse($sellers as $seller)
                                                    <tr class="text-center">
                                                        <td class="align-middle">
                                                            <img src="{{ isset($seller->user->profile_photo) ? asset($seller->user->profile_photo) : asset('images/no_image.jpg') }}"
                                                                width="100px" height="100px" style="border-radius: 50%;">
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $seller->user->first_name }} {{ $seller->user->last_name }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ isset($seller->user->sellerDetail->skill_type) ? $seller->user->sellerDetail->skill_type : '' }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $seller->date }}
                                                        </td>
                                                        <td class="align-middle">
                                                            <a
                                                                href="{{ route('create.appointment', [$seller->user_id, $seller->date]) }}">
                                                                <button class="btn btn-success">View</button>
                                                            </a>
                                                            <a
                                                                href="{{ route('create.appointment', [$seller->user_id, $seller->date]) }}">
                                                                <button class="btn btn-primary">Book Appointment</button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <td colspan="4" class="text-center text-danger">No expertise
                                                        available
                                                        today</td>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('panel/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('panel/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('panel/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('panel/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('panel/js/sb-admin-2.min.js') }}"></script>
    <!-- <script src="{{ asset('sweet-alert/sweet-alert.js') }}"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('panel/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('panel/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('panel/js/demo/datatables-demo.js') }}"></script>

    <script src="{{ asset('panel/js/bootstrap-datepicker.min.js') }}"></script>
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

@section('csslink')
    <link href="{{ asset('panel/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('guest/css/style.default.css') }}" id="theme-stylesheet">
    <link href="{{ asset('panel/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('panel/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection
