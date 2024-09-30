   <div class="row">
       <div class="col-lg-12">
           <div class="chat-list">
               <form>
                   <div class="chat-user-list" style="height:510">
                       <ul class="list-unstyled mb-0">
                           <input type="hidden" name="lead_id" id="lead_id" value="{{ $lead_id }}">

                           @foreach ($collect as $school)
                               <li class="media">
                                   <div class="custom-control custom-checkbox">

                                       <input type="checkbox" class="form-control" name="school_ids[]"
                                           id="{{ $school->id }}" value="{{ $school->id }}"
                                           onclick="myFunction('{{ $school->id }}')">
                                   </div>

                                   <!--<img class="align-self-center rounded-circle" src="{{ $school->school_logo }} alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">-->
                                   <div class="media-body">
                                       <h5>{{ $school?->name }}</h5>
                                       <p>{{ $school->address?->address }} </p>
                                       <p>Pin - {{ $school->address?->pincode }}</p>
                                   </div>
                                   @if ($school->is_mou == 1)
                                       <div style="color:rgb(47, 240, 47)">

                                           Mou Signed

                                       </div>
                                   @endif
                                   @if ($school->is_mou == 2)
                                       <div style="color:rgb(112, 51, 224)">

                                           Free Mou Signed

                                       </div>
                                   @endif
                                   <div style="padding-left:10px">
                                       {{ $school->distance }}KM
                                   </div>
                               </li>
                           @endforeach
                       </ul>
                   </div>

                   <div>
                       <button type="button" class="btn btn-primary" id="assign" style="display:none;"
                           onclick="LeadTransfer()">Transfer
                           Lead</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
   <script>
       var schools = [];
       debugger

       function myFunction(x) {
           if (document.getElementById(x).checked) {
               schools.push(x);
           }
           if (document.getElementById(x).checked == false) {
               const index = schools.indexOf(x);
               if (index > -1) {
                   schools.splice(index, 1);
               }
           }
           console.log(schools);
           if (schools.length > 0) {
               document.getElementById('assign').style.display = "block";
           }
           if (schools.length == 0) {
               document.getElementById('assign').style.display = "none";
           }
       }

       function LeadTransfer() {
           console.log(schools);
           var lead_id = $('#lead_id').val();
           var data = {
               school_ids: schools,
               lead_id: lead_id
           };
           var url = `/counselor/counselor/lead/transfer`;
           $.ajax({
               type: "POST",
               data: data,
               url: url,
               success: function(data) {
                   if (data.is_success) {
                       swal("Lead Transfered", "Lead Has been transfered successfully", "success");
                       location.reload();
                   }
               }
           });
       }
   </script>
