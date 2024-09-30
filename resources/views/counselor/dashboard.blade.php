@extends('layouts.counselor.app')

@section('title', 'Lead Dashboard')

@push('css')
@endpush

@section('content')

 <br>
    <!-- Start Contentbar -->
    <div class="contentbar">
        <div class="row" style="margin:35px">

           
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('counselor.new.leads') }}"><i
                                            class="feather icon-book"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">Leads</h5>
                                <h4 class="mb-0">{{ $total_assigned_leads }}</h4>
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
                                <span class="action-icon badge badge-primary-inverse mr-0"><a
                                        href="{{ route('counselor.old.leads') }}"><i
                                            class="feather icon-shopping-bag primary-rgba text-primary"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">Called Leads</h5>
                                <h4 class="mb-0">{{ $total_called }}</h4>
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
                                        href="{{ route('counselor.interested.leads') }}"><i
                                            class="feather icon-users success-rgba text-success"></i></a></span>
                            </div>
                            <div class="col-8 text-right">
                                <h5 class="card-title font-14">Interested Leads</h5>
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
                            <div class="col-4">
                                <span class="action-icon badge badge-warning-inverse mr-0"><a
                                        href="{{ route('counselor.pending.leads') }}"><i
                                            class="feather icon-users warning-rgba text-warning"></i></a></span>
                            </div>
                            <div class="col-8 text-right">
                                <h5 class="card-title font-14">Pending Leads</h5>
                                <h4 class="mb-0">{{ $pending_leads }}</h4>
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
                                <span class="action-icon badge badge-success-inverse mr-0"><a href=""><i
                                            class="feather icon-users success-rgba text-success"></i></a></span>
                            </div>
                            <div class="col-8 text-right">
                                <h5 class="card-title font-14">Admissions</h5>
                                <h4 class="mb-0">{{$total_admitted_leads}}</h4>
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
        <div style="position: relative; bottom: 10px" class="col-lg-12 col-xl-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <div style="text-align: justify ; padding: 10px" class="row  align-items-center">

                        <h6 style="color: red;
                        " class="mb-0"> Please be aware that your IP
                            Address
                            {{ request()->session()->get('ip_address') }} is being
                            tracked. This information may be used to monitor your online activity and location.</h4>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- End Contentbar -->
@endsection

@push('js')
@endpush
