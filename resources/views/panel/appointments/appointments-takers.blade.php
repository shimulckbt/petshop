@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Appointments: <span class="text-success">{{ $appointments->count() }}</span>
            </h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" role="grid"
                                    aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center" scope="col" width="5%">SL</th>
                                            <th class="text-center" scope="col" width="20%">Photo</th>
                                            <th class="text-center" scope="col" width="20%">Date</th>
                                            <th class="text-center" scope="col" width="20%">Customer</th>
                                            <th class="text-center" scope="col" width="20%">Email</th>
                                            <th class="text-center" scope="col" width="15%">Time</th>
                                            <th class="text-center" scope="col" width="15%">Expertise</th>
                                            <th class="text-center" scope="col" width="15%">Status</th>
                                            {{-- <th class="text-center" scope="col" width="15%">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($appointments as $key=>$appointment)
                                            <tr class="text-center">
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td class="align-middle"><img
                                                        src="{{ isset($appointment->customer->profile_photo) ? asset($appointment->customer->profile_photo) : asset('images/no_image.jpg') }}"
                                                        width="60px" style="border-radius: 50%;">
                                                </td>
                                                <td class="align-middle">{{ $appointment->date }}</td>
                                                <td class="align-middle">{{ $appointment->customer->first_name }}
                                                    {{ $appointment->customer->last_name }}</td>
                                                <td class="align-middle">{{ $appointment->customer->email }}</td>
                                                <td class="align-middle">{{ $appointment->time }}</td>
                                                <td class="align-middle">{{ $appointment->seller->first_name }}
                                                    {{ $appointment->seller->last_name }}</td>
                                                <td class="align-middle">
                                                    @if ($appointment->status == 0)
                                                        <a href="{{ route('update_appointment.status', [$appointment->id]) }}"
                                                            title="Make Visited"><button
                                                                class="btn btn-primary">Pending</button></a>
                                                    @else
                                                        <a href="{{ route('update_appointment.status', [$appointment->id]) }}"
                                                            title="Make Pending"><button
                                                                class="btn btn-success">Visited</button></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <td class="text-danger text-center" colspan="8">There is no appointments !
                                            </td>
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
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#notverify', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, cancel verification!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'notverifyd!',
                            'User has been unverified.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#verify', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Verify it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Verified!',
                            'User has been Verified.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
@endsection
