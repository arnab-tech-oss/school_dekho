@extends('layouts.lead.app')

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
                        <p><strong>{{ $lead_details->name }}</strong>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Email</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details->email }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Location</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details->location }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Pincode</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details->pincode }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Interested Board</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details->board }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Contact Number</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p><strong>{{ $lead_details->phone }}</strong>
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Parent Name</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details->email }}
                        </p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Pincode</label>
                    </div>
                    <div class="form-group col-md-9">
                        <p>{{ $lead_details->pincode }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @if (sizeof($lead_history) > 0)
            <div class="card m-b-10">
                <div class="row card-header">
                    <div class="col-sm ">
                        <h5 style="width: 150px" class="card-title">Previous Remarks</h5>
                    </div>

                    @if ($lead_details->status == 1)
                        <div class="col-sm"
                            style="color:green;background-color: lightgreen;padding:8px;position: relative;text-align: center;  margin-left: 75%; margin-right: 30px;">
                            Interested</div>
                    @elseif ($lead_details->status == 2)
                        <div class="col-sm"
                            style="color:red;background-color: rgb(236, 111, 111);padding:8px;position: relative;text-align: center;  margin-left: 75%; margin-right: 30px;">
                            Not Interested</div>
                    @elseif ($lead_details->status == 3)
                        <div class="col-sm"
                            style="color:yellow;background-color: rgb(240, 240, 161);padding:8px;position: relative;text-align: center;  margin-left: 75%; margin-right: 30px;">
                            No Response</div>
                    @elseif ($lead_details->status == 4)
                        <div class="col-sm"
                            style="color:red;background-color: rgb(241, 229, 229);padding:8px;position: relative;text-align: center;  margin-left: 75%; margin-right: 30px;">
                            Already Admitted</div>
                    @elseif ($lead_details->status == 5)
                        <div class="col-sm"y
                            style="color:green;background-color: lightgreen;padding:8px;position: relative;text-align: center;  margin-left: 75%; margin-right: 30px;">
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
                                    <th>Counselor Name</th>
                                    <th>Remarks</th>
                                    <th>Date Of calling</th>
                                    <th>Next Follow Up</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lead_history as $remark)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $remark->counselor->name }}</td>
                                        <td>{{ $remark->remarks }}</td>
                                        <td>{{ $remark->date_of_calling }}</td>
                                        <td>{{ $remark->next_follow_up }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
        @if (sizeof($transfer_schools) > 0)
            <div class="card m-b-10">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Lead Transfer to</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transfer_schools as $transfer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transfer?->school?->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
        <br>
        <div class="card m-b-10">
            <div class="card-header">
                <h5 class="card-title">Select Counselor</h5>
            </div>
            <div class="card-body">
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
                <div class="table-responsive">
                    <table class="table table-bordered">
                        @if (Session::has('message'))
                            <div class="alert alert-success col-md-12">
                                {{ Session::get('message') }}
                                @php
                                    Session::forget('message');
                                @endphp
                            </div>
                        @endif
                        <thead>
                            <form action="{{ route('lead.lead.transfer') }}" method="POST">
                                <input type="hidden" name="lead_id" value="{{ $lead_details->id }}">
                                <tr>
                                    <th>Current Counselor</th>
                                    <th> {{ $current_counselor_name }}</th>
                                    <th>
                                        <select name="counselor_id" id="" class="form-control">
                                            <option value="">Select Counselor</option>
                                            @foreach ($counselor_transfer as $counselor)
                                                <option value="{{ $counselor->id }}">{{ $counselor->name }}</option>
                                            @endforeach

                                        </select>
                                    </th>
                                    <th><button type="submit" class="btn btn-primary">Transfer</button></th>
                                </tr>
                            </form>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    </div>


    <!-- End Container -->


@endsection

@push('js')
@endpush
