@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Sellers</h1>
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
                                            <th class="text-center" scope="col" width="10%">Name</th>
                                            <th class="text-center" scope="col" width="10%">Skill</th>
                                            <th class="text-center" scope="col" width="10%">Company</th>
                                            <th class="text-center" scope="col" width="10%">Experience</th>
                                            <th class="text-center" scope="col" width="10%">PhoneNmber</th>
                                            <th class="text-center" scope="col" width="10%">Status</th>
                                            <th class="text-center" scope="col" width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @foreach ($sellers as $seller)
                                            <tr>
                                                <td class="text-center sorting_1">{{ $i++ }}</td>
                                                <td class="text-center">{{ $seller->first_name }}
                                                    {{ $seller->last_name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ isset($seller->sellerDetail->skill_type) ? $seller->sellerDetail->skill_type : 'Null' }}
                                                </td>
                                                <td class="text-center">
                                                    {{ isset($seller->sellerDetail->ownership_type) ? $seller->sellerDetail->ownership_type : 'Null' }}
                                                </td>
                                                <td class="text-center">
                                                    {{ isset($seller->sellerDetail->working_experience) ? $seller->sellerDetail->working_experience : 'Null' }}
                                                    Years</td>
                                                <td class="text-center">
                                                    {{ isset($seller->sellerDetail->phone_number) ? $seller->sellerDetail->phone_number : 'Null' }}
                                                </td>

                                                @if (isset($seller->sellerDetail) && $seller->sellerDetail->is_verified == 1)
                                                    <td class="text-center"><a
                                                            href="{{ route('cancelVerificationOfSeller', $seller->id) }}"
                                                            id="notverify"><span class="badge badge-pill badge-success"
                                                                style="font-weight: bold;"
                                                                title="Cancel Verification">Verified</span></a>
                                                    </td>
                                                @elseif (!isset($seller->sellerDetail))
                                                    <td class="text-center"><a href="#" id="notapplied"><span
                                                                class="badge badge-pill badge-warning"
                                                                style="font-weight: bold;" title="Cancel Verification">Not
                                                                Applied</span></a>
                                                    </td>
                                                @else
                                                    <td class="text-center"><a
                                                            href="{{ route('verifySeller', $seller->id) }}"
                                                            id="verify"><span class="badge badge-pill badge-primary"
                                                                style="font-weight: bold;" title="Verify Now">Not
                                                                Verified</span></a></td>
                                                @endif
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#sellerDetailsModal{{ $seller->id }}"
                                                        title="View Details"><i class="far fa-eye"></i></a>
                                                    <a href="{{ route('seller.edit', $seller->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-edit"
                                                            title="Edit Details"></i></a>

                                                    <a href="{{ route('seller.delete', $seller->id) }}" id="delete"
                                                        class="btn btn-danger btn-sm" title="Delete"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            @include('panel.seller.all.modal')
                                        @endforeach
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
