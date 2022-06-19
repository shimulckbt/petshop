<div class="modal fade" id="sellerDetailsModal{{$seller->id}}" tabindex="-1" aria-labelledby="sellerDetailsModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="sellerDetailsModalLabel">Seller Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <div class="modal-body">
            <p><img src="{{isset($seller->profile_photo) ? asset($seller->profile_photo) : asset('images/no_image.jpg')}}" class="table-user-thumb" alt="" width="200"></p>
            <p class="badge badge-pill badge-success">Role: {{$seller->role->name}}</p>
            <p>Full Name: {{$seller->first_name}} {{$seller->last_name}}</p>
            <p>Email: {{$seller->email}}</p>
            <p>Phone Number: {{isset($seller->sellerDetail->phone_number) ? $seller->sellerDetail->phone_number : 'Empty Field'}}</p>
            <p>Skill: {{isset($seller->sellerDetail->skill_type) ? $seller->sellerDetail->skill_type : 'Empty Field'}}</p>
            <p>Company Type: {{isset($seller->sellerDetail->ownership_type) ? $seller->sellerDetail->ownership_type : 'Empty Field'}}</p>
            <p>Working Experience: {{isset($seller->sellerDetail->working_experience) ? $seller->sellerDetail->working_experience : 'Empty Field'}} Years</p>
            <p>NID number: {{isset($seller->sellerDetail->nid_number) ? $seller->sellerDetail->nid_number : 'Empty Field'}}</p>
            <p>Address: {{isset($seller->sellerDetail->adsress) ? $seller->sellerDetail->adsress : 'No Address has been provided!'}}</p>
         </div>

      </div>
   </div>
</div>