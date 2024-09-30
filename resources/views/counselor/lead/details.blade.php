@extends('layouts.counselor.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-12">
                <h4 class="page-title">School Details</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.leads.all') }}">Leads</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lead Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Container -->
    <div class="contentbar">
        {{-- <div class="col-md-6"> --}}
        <div class="card m-b-24">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">Lead details</h4>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                        <div class="widgetbar">

                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Name</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ $lead_details?->name }}</strong>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Email</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details?->email }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Location</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details?->location }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Pincode</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details?->pincode }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Interested Board</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details?->board }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Contact Number</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ $lead_details?->phone }}</strong>
                        </p>
                    </div>
                    <input type="hidden" id="whatsapp_number" value="{{ $lead_details?->parent_whatsapp_number }}">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Parent Name</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details?->parent_name }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Parent Whatsapp Number</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details?->parent_whatsapp_number }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Pincode</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details?->pincode }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Date Of Birth</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details?->date_of_birth }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Admission for</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details?->admission_for }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Location for School</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details?->location_for_school }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Academic Session</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details?->academic_year }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Remarks for School</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details?->remarks_school }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <br>
        @if (sizeof($remarks) > 0)
            <div class="card m-b-10">
                <div class="card-header">
                    <h5 style="" class="card-title">Previous Remarks</h5>
                    @if ($lead_details->status == 1)
                        <div style="color:green;background-color: lightgreen;padding:8px;position: relative;">
                            Interested</div>
                    @elseif ($lead_details->status == 2)
                        <div style="color:red;background-color: rgb(236, 111, 111);padding:8px;position: relative;">
                            Not Interested</div>
                    @elseif ($lead_details->status == 3)
                        <div style="color:yellow;background-color: rgb(240, 240, 161);padding:8px;position: relative;">
                            No Response</div>
                    @elseif ($lead_details->status == 4)
                        <div style="color:red;background-color: rgb(241, 229, 229);padding:8px;position: relative;">
                            Already Admitted</div>
                    @elseif ($lead_details->status == 5)
                        <div style="color:green;background-color: lightgreen;padding:8px;position: relative;">
                            Admitted though School Dekho</div>
                    @endif
                </div>
                <div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Remarks</th>
                                    <th>Date Of calling</th>
                                    <th>Next Follow Up</th>
                                    <th>Follow Up Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($remarks as $remark)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $remark->remarks }}</td>
                                        <td>{{ $remark->date_of_calling }}</td>
                                        <td>{{ $remark->next_follow_up }}</td>
                                        <td>{{ Carbon\Carbon::parse($remark->followup_time)->format('g:i:s A') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
        <br>
        @if (sizeof($transfer_schools) > 0)
            @if (Session::has('delete_message'))
                <div class="alert alert-danger col-md-12">
                    {{ Session::get('delete_message') }}
                    @php
                        Session::forget('delete_message');
                    @endphp
                </div>
            @endif
            <div class="card m-b-10">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Lead Transfer to</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transfer_schools as $transfer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transfer->school->name }}</td>
                                        <td>{{ $transfer->school->school_address[0]->address }}</td>
                                        <td><a href="{{ route('counselor.lead.delete', [$lead_details->id, $transfer->school->id]) }}"
                                                class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (sizeof($is_mou))
                        <div>
                            <input type="hidden" id="lead_whatsapp_id" value="{{ $lead_details?->id }}">
                            <input type="button" value="Send Whatsapp Message" class="btn btn-primary"
                                onclick="SendWhatsappMessage()">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <br>
        @if ($counselor_active?->is_active)
            <div class="card m-b-24">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-8 col-lg-8">
                            <h4 class="page-title">Feedback Form</h4>
                        </div>
                        <div class="col-md-4 col-lg-4 ">
                            <div class="widgetbar">

                            </div>
                        </div>
                    </div>
                </div>
                @if (Session::has('message'))
                    <div class="alert alert-success col-md-12">
                        {{ Session::get('message') }}
                        @php
                            Session::forget('message');
                        @endphp
                    </div>
                @endif
                <form action="{{ route('counselor.remarks.submit') }}" method="post">
                    <div class="card-body">
                        <div class="form-row">
                            <input type="hidden" name="lead_id" value="{{ $lead_details->id }}">
                            <div class="form-group col-md-3">
                                <label>Remarks</label>
                            </div>
                            <div class="form-group col-md-9">
                                <textarea name="remarks" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-row">

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Follow Up Status</label>
                            </div>
                            <div class="form-group col-md-4">
                                <select name="status" id="followup_status" class="form-control">
                                    <option value="">-- Select Followup status--</option>
                                    <option value="1">Need to be follow up</option>
                                    <option value="0">No Followup required</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row" id="hidden_div1" style="display:none">
                            <div class="form-group col-md-3">
                                <label>Next follow up date</label>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="date" name="next_date" id="" class="form-control">
                            </div>
                        </div>
                        <div class="form-row" id="hidden_div2" style="display:none">
                            <div class="form-group col-md-3">
                                <label>Next follow up time</label>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="time" name="follow_up_time" id="" class="form-control">
                            </div>
                        </div>

                        <div class="form-row" id="hidden_div3">
                            <div class="form-group col-md-3">
                                <label>Admission Status</label>
                            </div>
                            <div class="form-group col-md-4">
                                <select name="status" id="admission_status" class="form-control">
                                    <option value="">select status</option>
                                    <option value="1">Intersted</option>
                                    <option value="2">Not Interested</option>
                                    <option value="3">No Response</option>
                                    <option value="4">Admitted</option>
                                    <option value="5">Admitted Through School Dekho</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row" id="admission_school" style="display:none">
                            <div class="form-group col-md-3">
                                <label for="">Admitted School</label>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control example" name="school_id" required>
                                    <option>select school</option>
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">
                                            @if (isset($school->school_address[0]?->address))
                                                {{ $school->name }},{{ $school->school_address[0]?->address }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3"></div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <script>
                document.getElementById('followup_status').addEventListener('change', function() {
                    var style = this.value;
                    if (style == 1) {
                        document.getElementById('hidden_div1').style.display = 'block';
                        document.getElementById('hidden_div2').style.display = 'block';
                        document.getElementById('hidden_div1').style.display = 'flex';
                        document.getElementById('hidden_div2').style.display = 'flex';
                    }
                    if (style == 0) {
                        document.getElementById('hidden_div1').style.display = 'none';
                        document.getElementById('hidden_div2').style.display = 'none';
                    }
                });

                document.getElementById('admission_status').addEventListener('change', function() {
                    var status = this.value;
                    if (status == 5) {
                        document.getElementById('admission_school').style.display = 'flex';
                    } else {
                        document.getElementById('admission_school').style.display = 'none';
                    }
                });
            </script>
        @endif
        <br>
        <!--@livewire('lead-transfer', ['lead_id' => $lead_details->id])-->
        <br>
        @if (Session::has('message'))
            <div class="alert alert-success col-md-12">
                {{ Session::get('message') }}
                @php
                    Session::forget('message');
                @endphp
            </div>
        @endif
        <div class="card m-b-10">
            <div class="card-body">
                <form>
                  <div class="form-row">
                    <div id="latitudeArea" class="form-group col-md-3">
                      <label for="latitude">Latitude</label>
                      <input id="latitude" type="text" name="latitude" class="form-control">
                      <input id="lead_id" type="hidden" name="lead_id" value="{{ $lead_details->id }}">
                    </div>
                    <div id="longtitudeArea" class="form-group col-md-3">
                      <label for="longitude">Longitude</label>
                      <input id="longitude" type="text" name="longitude" class="form-control">
                    </div>
                    <!--<div class="form-group col-md-2">-->
                    <!--    <input id="distance" type="range" name="distance" value="0" min="0"-->
                    <!--        max="20">-->
                    <!--</div>-->
                    <div class="form-group col-md-2" style="padding-top: 30px">
                      <label for=""></label>
                      <input type="button" value="Search" class="btn btn-primary" onclick="GetSchools()">
                    </div>
                    <div class="form-group col-md-2" style="padding-top: 30px">
                      <input type="button" value="Clear" class="btn btn-primary" onclick="ClearData()">
                    </div>
                  </div>
                </form>
                <span style="color:green;display:none" id="transfer_status"></span>
                <div id="school_suggestion">

                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- End Container -->

@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.example').select2();
        });
    </script>
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyBtWE84XIIE6anZBgc6KMiefOpYnsWVArE&libraries=places&callback=initAutocomplete">
    </script>

    <script>
        google.maps.event.addDomListener(autocomplete, 'keydown', function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
            }
        });
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            const options = {
                componentRestrictions: {
                    country: "in"
                },
            };
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());
            });
        }

        function GetSchools() {
            var location = $('#autocomplete').val();
            var latitude = $('#latitude').val();
            var longitude = $('#longitude').val();
            var lead_id = $('#lead_id').val();
            // console.log(location, latitude);
            var url =
                `/counselor/counselor/location/search?location=${location}&latitude=${latitude}&longitude=${longitude}&lead_id=${lead_id}`;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('#school_suggestion').html(data);
                }
            });
        }

        function ClearData() {

            document.getElementById('school_suggestion').style.display = 'none';
            location.reload();
        }

        function SendWhatsappMessage() {
            var whatsappnumber = $('#whatsapp_number').val();
            var lead_whatsapp_id = $('#lead_whatsapp_id').val();
            var data = {
                whatsappnumber: whatsappnumber,
                lead_id: lead_whatsapp_id
            };
            var url = `/counselor/counselor/send/whatsapp`;
            $.ajax({
                type: "POST",
                data: data,
                url: url,
                success: function(data) {
                    if (data.is_success) {
                        swal("Message Transfered", data.message, "success");
                    } else {
                        swal("Failed", data.message, "Warning");
                    }
                }
            });
        }
    </script>
@endpush
