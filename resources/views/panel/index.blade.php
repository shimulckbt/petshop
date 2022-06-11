@extends('panel.layouts.app')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        @if(Auth::user()->role_id==2)
        @if(!isset(Auth::user()->sellerDetail))
        <button class="btn btn-danger" id="hideButton" data-toggle="modal" data-target="#sellerDetailsModal">Provide more details for verification please...</button>
        @elseif(isset(Auth::user()->sellerDetail)&&(Auth::user()->sellerDetail->is_verified==0))
        <button class="btn btn-dark" id="showReviewButton">Please wait, we are reviewing your details..</button>
        @endif
        @endif
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">40,000 TK</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">215,000 TK</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal Seller Details -->

<div class="modal fade" id="sellerDetailsModal" tabindex="-1" aria-labelledby="sellerDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sellerDetailsModalLabel">Add Your Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="sellerDetailsForm">
                    @csrf
                    <div class="form-group">
                        <label for="skill_type">Add Your Skill</label>
                        <input type="text" name="skill_type" class="form-control" id="skill_type">
                        <span class="text-danger small error_text skill_type_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="ownership_type">Personal/Company</label>
                        <select name="ownership_type" id="ownership_type" class="form-control">
                            <option selected disabled>Select Company type</option>
                            <option value="personal">Personal</option>
                            <option value="company">Company</option>
                        </select>
                        <span class="text-danger small error_text ownership_type_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="working_experience">Working Experience</label>
                        <input type="number" name="working_experience" class="form-control" id="working_experience">
                        <span class="text-danger small error_text working_experience_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone No</label>
                        <input type="text" name="phone_number" class="form-control" id="phone_number">
                        <span class="text-danger small error_text phone_number_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="nid_number">NID/Birth Registration No</label>
                        <input type="text" name="nid_number" class="form-control" id="nid_number">
                        <span class="text-danger small error_text nid_number_error"></span>
                    </div>

                    <!-- <div class="form-group">
                        <label for="picture_with_nid">Photo with NID/BR No</label>
                        <input type="image" class="form-control" id="picture_with_nid">
                    </div> -->

                    <div class="form-group">
                        <label for="adsress">Your Address</label>
                        <textarea name="adsress" cols="" rows="3" class="form-control" id="adsress"></textarea>
                        <span class="text-danger small error_text adsress_error"></span>
                    </div>

                    <button type="submit" class="btn btn-primary text-center">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $('#sellerDetailsForm').submit(function(e) {
        e.preventDefault();

        let data = $('#sellerDetailsForm').serialize();
        console.log(data);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('storeSellerDetails') }}",
            data: data,
            dataType: 'json',
            beforeSend: function() {
                $(document).find('span.error_text').text('');
            },
            success: function(response) {
                if (response.status == 200) {
                    $('#sellerDetailsForm')[0].reset();
                    $('#sellerDetailsModal').modal('hide');
                    $('#hideButton').hide();
                    alert(response.message);
                } else if (response.status == 400) {
                    $.each(response.error, function(prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                }
            }
        });
    });
</script>

@endsection