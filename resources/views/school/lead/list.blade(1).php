@extends('layouts.school.app')

@section('title','School Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-12">
            <h4 class="page-title">List Leads</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('school.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Leads</li>
                </ol>
            </div>
        </div>

    </div>
</div>
<!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->

                <!-- Start row -->

                    <!-- Start col -->

                    <!-- End col -->
                    <!-- Start col -->
                    <div class="contentbar">
                    {{-- <div class="col-md-6"> --}}
                        <div class="card m-b-10">
                            <div class="card-header">
                                <h5 class="card-title">All active leads</h5>
                                                   <form method="post" class="mt-3" action="{{ route('school.lead.export') }}">
                                                        {{ csrf_field() }}
                                                        <div class="filter" style="display:flex;">
                                                            <input type="hidden" name="school_id" value="{{ $School_claims[0]->school->id }}">
                                                            <div class="filter-item">
                                                                <label for="start_date">Start Date</label>
                                    
                                                                <input type="date" name="start_date" id="" class="form-control" required>
                                                            </div>
                                                            <div class="filter-item" style="padding-left: 20px;">
                                                                <label for="end_date">End Date</label>
                                                                <input type="date" name="end_date" id="" class="form-control" required>
                                                            </div>
                                                            <div class="filter-item" style="margin-left: 16px; margin-top: 32px;">
                                                                <button type="submit" class="btn btn-primary">Export</button>
                                                            </div>
                                    
                                                        </div>
                                                    </form>
                            </div>
                           
                            @foreach ($School_claims as $School_claim)
                                @if(sizeof($payment_status)>0)
                                    @foreach ($payment_status as $payment)
                                        @if ($payment->school_id == $School_claim->school_id)
                                            <div class="card-body">
                                                <p style="font-size: 30px;"><b>{{ $School_claim->school->name }}</b></p>
                                                <p>Your Subscription is valid upto:  <b>{{ \Carbon\Carbon::parse($payment->validated_at)->format('d M Y') }}</b></p>
                                                <table id="school-table" class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>SL No</th>
                                                        <th>Student Name</th>
                                                        <th>Mobile Number</th>
                                                        <!--<th>Location</th>-->
                                                        <th>Admission Status</th>
                                                        <th>Lead Details</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    @foreach($leads as $lead)
                                                        @if ($School_claim->school_id == $lead['school_id'])
                                                            <tr>
                                                                
                                                            <td>{{$loop->iteration}}</td>

                                                            @if ($lead['lead']['student_name'])
                                                                <td>{{ $lead['lead']['student_name'] }}</td>
                                                                
                                                                @if( $lead['lead']['student_contact1'] != null)
                                                                    <td>{{ $lead['lead']['student_contact1']}}</td>
                                                                @else
                                                                    <td>echo "NA"</td>
                                                                @endif
                                                            @else
                                                            <td>
                                                                @php
                                                                    $x= $lead['lead']['application'];
                                                                    $val = ($x[0]->elements[0]->value);
                                                                    echo $val;
                                                                @endphp

                                                            </td>
                                                            @endif
                                                            <td>
                                                                @php
                                                                    if($lead['lead']['admission'] == "1")
                                                                        echo '<span class="badge badge-success-inverse">Yes</span>';
                                                                    else
                                                                        echo '<span class="badge badge-warning-inverse">No</span>';
                                                                @endphp
                                                            </td>

                                                            <td>
                                                                <a href="{{ route('school.lead.details', [$lead['lead']['id'], $lead['school_id']]) }}" class="btn btn-info">View</a>

                                                            </td>
                                                        </tr>
                                                        @endif

                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            {{-- <div class="card-body">
                                                <p>Lead for School : <b>{{ $School_claim->school->name }}</b></p>
                                                <table id="school-table" class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Lead ID #</th>
                                                        <th>Student Name</th>
                                                        <!--<th>School ID</th>-->
                                                        <!--<th>Location</th>-->
                                                        <th>Admission Status</th>
                                                        <th>Lead Details</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                       @php
                                                           $i = 0;
                                                       @endphp



                                                    @foreach($leads as $lead)
                                                        @if ($i++>1)
                                                            @php
                                                                break;
                                                            @endphp
                                                        @endif
                                                        <tr>
                                                            <td>{{$lead['lead']['id']}}</td>

                                                            @if ($lead['lead']['student_name'])
                                                                <td>{{ $lead['lead']['student_name'] }}</td>
                                                            @else
                                                            <td>
                                                                @php
                                                                    $x= $lead['lead']['application'];
                                                                    $val = ($x[0]->elements[0]->value);
                                                                    echo $val;
                                                                @endphp

                                                            </td>
                                                            @endif
                                                            <!--<td>{{$lead['school_id']}}</td>-->
                                                            <!--<td>{{$lead['lead']['location']}}</td>-->
                                                            <td>
                                                                @php
                                                                    if($lead['lead']['admission'] == 1)
                                                                        echo '<span class="badge badge-success-inverse">Yes</span>';
                                                                    else
                                                                        echo '<span class="badge badge-warning-inverse">No</span>';
                                                                @endphp
                                                            </td>

                                                            <td>
                                                                <a href="{{ route('school.lead.details', [$lead['lead']['id'], $lead['school_id']]) }}" class="btn btn-info">View</a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="6"><a class="btn btn-outline-warning d-flex align-items-center justify-content-center" href="{{ route('school.list') }}">Subscribe now to see all Leads</a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div> --}}
                                        @endif
                                    @endforeach
                                @else
                                    <div class="card-body">
                                        <p>Lead for School : <b>{{ $School_claim->school->name }}</b></p>
                                        {{-- <p>Free trial remaining <b>{{ \Carbon\Carbon::parse($payment->validated_at)->diffForHumans() }}</b></p> --}}
                                        <table id="school-table" class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Lead ID#</th>
                                                <th>Student Name</th>
                                                <th>Mobile Number</th>
                                                <!--<th>Location</th>-->
                                                <th>Admission Status</th>
                                                <th>Lead Details</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                               @foreach($leads as $lead)
                                                    <tr>
                                                        <td>{{$lead['lead']['id']}}</td>

                                                        @if ($lead['lead']['student_name'])
                                                            <td>{{ $lead['lead']['student_name'] }}</td>
                                                            <td style="color:red">
                                                                @if( $lead['lead']['student_contact1'] != null)
                                                                {{ str_repeat('X', strlen($lead['lead']['student_contact1']) - 4) . substr($lead['lead']['student_contact1'], -4) }}
                                                                @else
                                                                    echo "NA"
                                                                @endif
                                                            </td>
                                                        @else
                                                        <td>
                                                            @php
                                                                $x= $lead['lead']['application'];
                                                                $val = ($x[0]->elements[0]->value);
                                                                echo $val;
                                                            @endphp

                                                        </td>
                                                        @endif
                                                        <td>
                                                            @php
                                                                if($lead['lead']['admission'] == "1")
                                                                    echo '<span class="badge badge-success-inverse">Yes</span>';
                                                                else
                                                                    echo '<span class="badge badge-warning-inverse">No</span>';
                                                            @endphp
                                                        </td>

                                                        <td>
                                                            <a href="#" class="btn btn-info disabled">View</a>
                                                        </td>
                                                    </tr>
                                            @endforeach
                                                <tr>
                                                    <td colspan="4">
                                                        <form method="post" action="{{route('school.pay')}}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="school_id" value="{{$School_claim->school_id}}" />
                                                            <input type="hidden" name="school_claim_id" value="{{auth()->user()->id}}" />
                                                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_live_X9O7BRZnb4XdjI" data-amount="1416000" data-name="schooldekho.org" data-description="Razorpay" data-image="{{ asset('assets/images/logo.png') }}" async>
                                                            </script>

                                                            <style>
                                                                .razorpay-payment-button {
                                                                    background-color: rgba(0, 102, 255);
                                                                    color: white;
                                                                    margin-top: 20px;
                                                                    width: 35%;
                                                                    border: 1px solid;
                                                                    height: 40px;
                                                                }
                                                            </style>

                                                        </form>
                                                    </td>
                                                    <td colspan="3">
                                                        <a href="" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">Subscription Benifits</a>
                                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleLargeModalLabel">Benifits of Subscription</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="col-md-10 col-lg-10 col-xl-10">
                                                                            <div class="card m-b-30">
                                                                                <div class="card-body p-0">
                                                                                    <div class="pricing text-center">
                                                                                        <p class="text-center text-white mb-0"><span class="badge badge-primary text-uppercase rounded-top-0 font-16">Subscription Benefits</span></p>
                                                                                        <div class="pricing-top">
                                                                                            {{-- <h5 class="text-primary mb-0">Click the subscribe button after the claim of your school is verified.</h5> --}}
                                                                                            <!-- <img src="assets/images/pricing/pricing-premium.svg" class="img-fluid price-pro-image my-4" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"> -->
                                                                                            <div class="pricing-amount pt-4">
                                                                                                <h2 class="text-primary mb-0"><sup></sup>INR 12,000 + GST</h2>
                                                                                                <h5 class="pricing-duration">Per Year</h5>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="pricing-middle text-left pl-5">
                                                                                            <ul class="list-group">
                                                                                                <li class="list-group-item"><i class="feather icon-check mr-2"></i>School Dekho Verified Tag with Blue Tick </li>
                                                                                                <li class="list-group-item"><i class="feather icon-check mr-2"></i>Editable Content – Schools will be able to edit their information through their School login portal.</li>
                                                                                                <li class="list-group-item"><i class="feather icon-check mr-2"></i>Add on Information- Schools will be allowed to incorporate any additional information, as they seem fit.</li>
                                                                                                <li class="list-group-item"><i class="feather icon-check mr-2"></i>Current Event- Schools can exhibit their current events in the portal.</li>
                                                                                                <li class="list-group-item"><i class="feather icon-x mr-2"></i>Associated Institutes- Schools belonging to a group of institutions can claim the other schools under their own group or franchise.</li>
                                                                                                <li class="list-group-item"><i class="feather icon-x mr-2"></i>Trending-Subscribed schools will be portrayed as the trending schools in that particular geographical area.</li>
                                                                                                <li class="list-group-item"><i class="feather icon-x mr-2"></i>Customized social media posts- Schools are entitled to receive customized social media posts of National and International importance based on the relevance of the day. </li>
                                                                                                <li class="list-group-item"><i class="feather icon-x mr-2"></i>Verified Location Based Leads- Institutes are entitled to both web based and in-house leads.</li>
                                                                                                <li class="list-group-item"><i class="feather icon-x mr-2"></i>Admission Form- Schools can put up their customized admission form in the portal.</li>
                                                                                                <li class="list-group-item"><i class="feather icon-x mr-2"></i>24 X 7 Priority Support from School Dekho team</li>
                                                                                                <li class="list-group-item"><i class="feather icon-x mr-2"></i>Subscription validity is for 1 year</li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif

                            @endforeach
                            {{-- <!--@foreach ($payment_status as $payment)
                            <div class="card-body">
                                <table id="school-table" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Lead ID</th>
                                        <th>Student Name</th>
                                        <th>School ID</th>
                                        <th>Location</th>
                                        <th>Admission</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($leads as $lead)

                                    <tr>
                                        <td>{{$lead['lead']['id']}}</td>

                                        @if ($lead['lead']['student_name'])
                                            <td>{{ $lead['lead']['student_name'] }}</td>
                                        @else
                                        <td>
                                            @php
                                                $x= $lead['lead']['application'];
                                                $val = ($x[0]->elements[0]->value);
                                                echo $val;
                                            @endphp

                                        </td>
                                        @endif
                                        <td>{{$lead['school_id']}}</td>
                                        <td>{{$lead['lead']['location']}}</td>
                                        <td>
                                            @php
                                                if($lead['lead']['admission'] == 1)
                                                    echo '<span class="badge badge-success-inverse">Yes</span>';
                                                else
                                                    echo '<span class="badge badge-warning-inverse">No</span>';
                                            @endphp
                                        </td>

                                        <td>
                                            <a href="{{ route('school.lead.details', [$lead['lead']['id'], $lead['school_id']]) }}" class="btn btn-info">View</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endforeach--> --}}

                            {{-- </div> --}}
                        </div>
                    {{-- </div> --}}
                    </div>
                    <!-- End col -->

                <!-- End row -->

            <!-- End Contentbar -->




@endsection

@push('js')

@endpush
