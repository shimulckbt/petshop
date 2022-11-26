@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Appointments: <span class="text-success">{{ $appointments->count() }}</span>
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
                                            <th class="text-center" scope="col" width="20%">Expertise</th>
                                            <th class="text-center" scope="col" width="20%">Time</th>
                                            <th class="text-center" scope="col" width="20%">Appointment Date</th>
                                            <th class="text-center" scope="col" width="20%">Created date</th>
                                            <th class="text-center" scope="col" width="15%">Status</th>
                                            {{-- <th class="text-center" scope="col" width="15%">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($appointments as $key=>$appointment)
                                            <tr class="text-center">
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $appointment->seller->first_name }}
                                                    {{ $appointment->seller->last_name }}
                                                </td>
                                                <td>{{ $appointment->time }}</td>
                                                <td>{{ $appointment->date }}</td>
                                                <td>{{ $appointment->created_at }}</td>
                                                <td>
                                                    @if ($appointment->status == 0)
                                                        <button class="btn btn-primary">Not visited</button>
                                                    @else
                                                        <button class="btn btn-success">Visited</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <td>You have no any appointments</td>
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
