@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">School Details</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.claim.query.list') }}">Queries</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
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
    <div class="card m-b-24">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-8">
                    <!-- 0 -> new claim, 1-> verification started,
                        2-> school claim success, 3-> email verified, 4-> mobile verified
                        7-> claim dismissed -->
                    <h4 class="page-title">School Claim Query
                        @if ($claimer_details->status == 0)
                            <span class="badge badge-primary"> New claim</span>
                        @elseif ($claimer_details->status == 1 || $claimer_details->status == 4 || $claimer_details->status == 3)
                            <span class="badge badge-warning">Verification in progress</span>
                        @elseif ($claimer_details->status == 2)
                            <span class="badge badge-success">Claimed</span>
                        @elseif ($claimer_details->status == 7)
                            <span class="badge badge-danger">Dismissed</span>
                        @endif

                    </h4>

                </div>

            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label><strong>School Name</strong></label>
                    <input type="hidden" name="school_name" value="{{$claimer_details?->school_name}}">
                    <p>
                        {{$claimer_details?->school_name}}
                    </p>
                </div>
                <div class="form-froup col-md-3">
                    <label><strong>Location Of School</strong></label>
                    <p>
                        {{$claimer_details?->location}}
                    </p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label><strong>Official Email</strong></label>
                    <input type="hidden" name="school_name" value="{{$claimer_details?->school_name}}">
                    <p>
                        {{$claimer_details?->official_email}}
                        @if ($claimer_details->status == 3 || $claimer_details->status == 4 || $claimer_details->status == 5 || $claimer_details->status == 2)
                            <span class="badge badge-primary">email verified</span>
                        @endif
                    </p>
                </div>
                <div class="form-froup col-md-3">
                    <label><strong>Official Contact No.</strong></label>
                    <p>
                        {{$claimer_details?->official_contact}}
                        @if ($claimer_details->status == 4 || $claimer_details->status == 2 || $claimer_details->status == 5)
                            <span class="badge badge-primary">Contact verified</span>
                        @endif
                    </p>
                </div>
            </div>

        </div>
    </div>
    <br>
    <div class="card m-b-24">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Claimer Details</h4>
                </div>
                <div class="col-md-4 col-lg-4 ">
                </div>
            </div>
        </div>
        <hr>
        @if(Session::has('message'))
        <div class="alert alert-success col-md-12">
            {{ Session::get('message') }}
            @php
            Session::forget('message');
            @endphp
        </div>
        @endif
        <div class="card-body">
           
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label><strong>Contact Name</strong></label>
                        <p>
                            {{ $claimer_details?->contact_person }}
                        </p>

                        <input type="hidden" value="{{$claimer_details?->contact_person}}" name="name">
                    </div>
                    <div class="form-froup col-md-3">
                        <label><strong>Email</strong></label>
                        <p>
                            {{$claimer_details?->email_id}}
                            
                        </p>

                        <input type="hidden" name="email" value="{{$claimer_details?->email_id}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label><strong>Contact Number</strong></label>
                        <p>
                            {{$claimer_details?->contact_number}}
                            
                        </p>
                    </div>
                    @if ($claimer_details->status == 0)

                        <a class="btn btn-primary" href="{{ route('admin.claim.verify.email', $claimer_details->id )}}">Start verification process</a>

                        <a class="btn btn-warning" href="#">Cancel Claim</a>
                    @endif
                </div>

        </div>
    </div>
    <br>
    
   @if($claimer_details?->status == 4)
        
        <div class="card m-b-24">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Approve School Claim</h4>
                </div>
                <div class="col-md-4 col-lg-4 ">
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <form action="{{ route('admin.school.approve.claim') }}" method="post">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label><strong>School Name</strong></label>
                    <input type="hidden" name="claim_id" value="{{$claimer_details?->id}}">
                    <!--<input type="hidden" name="phone" value="{{$claimer_details?->contact_number}}">-->
                    <!--<input type="hidden" name="name" value="{{$claimer_details?->contact_person}}">-->
                    <!--<input type="hidden" name="email" value="{{$claimer_details?->email_id}}">-->
                    
                    @livewire('list-school')
                    <hr>
                    <input type="text" class="form-control" name="school_name" value="" placeholder="Type school name here for new school registration">
                </div>
             
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-5">
                    @if ($claimer_details->status == 0)
                        <a class="btn btn-primary" href="{{ route('admin.claim.verify.email', $claimer_details->id )}}">Start verification process</a>
                        <a class="btn btn-warning" href="#">Cancel Claim</a>
                    @elseif ($claimer_details->status == 1  || $claimer_details->status == 3)
                        <span class="badge badge-warning">Verification in progress</span>
                    @elseif ($claimer_details->status == 4)
                        <button type="submit" class="btn btn-primary">Approve Claim</button>
                    @elseif ($claimer_details->status == 2)
                        <span class="badge badge-success">School Claimed</span>
                    @elseif ($claimer_details->status == 7)
                        <span class="badge badge-danger">Dismissed</span>
                    @endif
                </div>
            </div>
            </form>
        </div>
    </div>
  @endif
</div>
<!-- End col -->

<!-- End row -->

<!-- End Contentbar -->




@endsection

@push('js')
@endpush
