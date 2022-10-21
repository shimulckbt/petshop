@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Publish Reviews</h1>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" role="grid"
                                    aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                    <thead>
                                        <tr role="row" class="text-center">
                                            <th>SL</th>
                                            <th>Summary </th>
                                            <th>Comment </th>
                                            <th>User </th>
                                            <th>Product </th>
                                            <th>Status </th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php($i = 1)
                                        @foreach ($reviews as $review)
                                            <tr>
                                                <td class="text-center align-middle">{{ $i++ }}</td>
                                                <td class="align-middle text-center"> {{ $review->summary }} </td>
                                                <td class="align-middle"> {{ $review->comment }} </td>
                                                <td class="align-middle text-center"> {{ $review->user->first_name }}
                                                    {{ $review->user->last_name }}</td>
                                                <td class="align-middle text-center"> {{ $review->product->name }} </td>
                                                <td class="align-middle text-center">
                                                    @if ($review->status == 0)
                                                        <span class="badge badge-pill badge-primary">Pending </span>
                                                    @elseif($review->status == 1)
                                                        <span class="badge badge-pill badge-success">Publish </span>
                                                    @endif
                                                </td>
                                                <td width="10%" class="align-middle text-center">
                                                    <a href="{{ route('review.inapprove', $review->id) }}"
                                                        class="btn btn-danger">Inapprove </a>
                                                </td>
                                            </tr>
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
                    confirmButtonText: 'Yes, cancel it!'
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
                    confirmButtonText: 'Yes, Publish it!'
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
