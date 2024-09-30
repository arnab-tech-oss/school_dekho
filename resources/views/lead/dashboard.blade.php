@extends('layouts.lead.app')

@section('title', 'Lead Dashboard')

@push('css')
@endpush

@section('content')


    <!-- Start Contentbar -->
    <div class="contentbar">
        <div class="row" style="margin:35px">


            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('lead.lead.list') }}"><i class="feather icon-book"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">Leads</h5>
                                <h4 class="mb-0">{{ $number_of_leads }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('lead.lead.assign') }}"><i
                                            class="feather icon-shopping-bag success-rgba text-success"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">Assign Leads</h5>
                                <h4 class="mb-0">{{ $assigned_leads }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('lead.counselor.list') }}"><i
                                            class="feather icon-users primary-rgba text-primary"></i></a></span>
                            </div>
                            <div class="col-8 text-right">
                                <h5 class="card-title font-14">Counselors</h5>
                                <h4 class="mb-0">{{ $counselors }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <span class="action-icon badge badge-success-inverse mr-0"><a href="{{ route('lead.lead.admission') }}"><i
                                            class="feather icon-users success-rgba text-success"></i></a></span>
                            </div>
                            <div class="col-8 text-right">
                                <h5 class="card-title font-14">Admissions</h5>
                                <h4 class="mb-0">{{$total_admission}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('lead.interested.list') }}"><i
                                            class="feather icon-users primary-rgba text-primary"></i></a></span>
                            </div>
                            <div class="col-8 text-right">
                                <h5 class="card-title font-14">Interested</h5>
                                <h4 class="mb-0">{{ $interested_leads }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <span class="action-icon badge badge-danger-inverse mr-0"><a
                                        href="{{ route('lead.notinterested.list') }}"><i
                                            class="feather icon-users danger-rgba text-danger"></i></a></span>
                            </div>
                            <div class="col-9 text-right">
                                <h5 class="card-title font-14">Not Interested</h5>
                                <h4 class="mb-0">{{ $not_interested_leads }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <span class="action-icon badge badge-success-inverse mr-0"><a href="{{ route('lead.transfer') }}"><i
                                            class="feather icon-users primary-rgba text-primary"></i></a></span>
                            </div>
                            <div class="col-9 text-right">
                                <h5 class="card-title font-14">Transfered Leads</h5>
                                <h4 class="mb-0">{{ $total_school_transfer_lead_count }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Contentbar -->
@endsection

@push('js')
@endpush
