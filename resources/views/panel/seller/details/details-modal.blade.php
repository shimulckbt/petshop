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
                            <option value="Personal">Personal</option>
                            <option value="Company">Company</option>
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
                        // alert(response.message);
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
