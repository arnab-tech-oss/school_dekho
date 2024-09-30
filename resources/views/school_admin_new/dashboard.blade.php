@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
@section('content')
    <!-- Start Contentbar -->
    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">Dashboard</h4>
            <!-- Dashboard Info Start -->
            <div class="dashboard-info">
                <div class="row gy-2 gy-sm-6">
                    <div class="col-md-4 col-sm-6">
                        <!-- Dashboard Info Card Start -->
                        <div class="dashboard-info__card">
                            <a class="dashboard-info__card-box" href="{{ route('schooladmin.leads.all') }}">
                                <div class="dashboard-info__card-icon icon-color-01">
                                    <i class="edumi edumi-group"></i>
                                </div>
                                <div class="dashboard-info__card-content">
                                    <div class="dashboard-info__card-value">{{ $lead_count }}</div>
                                    <div class="dashboard-info__card-heading">Total Leads</div>
                                </div>
                            </a>
                        </div>
                        <!-- Dashboard Info Card End -->
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <!-- Dashboard Info Card Start -->
                        <div class="dashboard-info__card">
                            <a class="dashboard-info__card-box" href="{{ route('schooladmin.schools') }}">
                                <div class="dashboard-info__card-icon icon-color-02">
                                    <i class="edumi edumi-group"></i>
                                </div>
                                <div class="dashboard-info__card-content">
                                    <div class="dashboard-info__card-value">{{ $verified_school_count }}</div>
                                    <div class="dashboard-info__card-heading">Your Schools</div>
                                </div>
                            </a>
                        </div>
                        <!-- Dashboard Info Card End -->
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <!-- Dashboard Info Card Start -->
                        <div class="dashboard-info__card">
                            <a class="dashboard-info__card-box" href="school-admin-lead-center.php">
                                <div class="dashboard-info__card-icon icon-color-04">
                                    <i class="edumi edumi-group"></i>
                                </div>
                                <div class="dashboard-info__card-content">
                                    <div class="dashboard-info__card-value">{{ $total_admission_count }}</div>
                                    <div class="dashboard-info__card-heading">No of Admissions</div>
                                </div>
                            </a>
                        </div>
                        <!-- Dashboard Info Card End -->
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <!-- Dashboard Info Card Start -->
                        <div class="dashboard-info__card">
                            <a class="dashboard-info__card-box" href="{{ route('schooladmin.schools') }}">
                                <div class="dashboard-info__card-icon icon-color-03">
                                    <i class="edumi edumi-correct"></i>
                                </div>
                                <div class="dashboard-info__card-content">
                                    <div class="dashboard-info__card-value">{{ $claimed_schools_count }}</div>
                                    <div class="dashboard-info__card-heading">School Claimed</div>
                                </div>
                            </a>
                        </div>
                        <!-- Dashboard Info Card End -->
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <!-- Dashboard Info Card Start -->
                        <div class="dashboard-info__card">
                            <a class="dashboard-info__card-box" href="{{ route('schooladmin.notifications') }}">
                                <div class="dashboard-info__card-icon icon-color-01">
                                    <i class="edumi edumi-star"></i>
                                </div>
                                <div class="dashboard-info__card-content">
                                    <div class="dashboard-info__card-value">4</div>
                                    <div class="dashboard-info__card-heading">New Notifications</div>
                                </div>
                            </a>
                        </div>
                        <!-- Dashboard Info Card End -->
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <!-- Dashboard Info Card Start -->
                        <div class="dashboard-info__card">
                            <a class="dashboard-info__card-box" href="#">
                                <div class="dashboard-info__card-icon icon-color-01">
                                    <i class="edumi edumi-star"></i>
                                </div>
                                <div class="dashboard-info__card-content">
                                    <div class="dashboard-info__card-value">{{ $profile_percentage }}%</div>
                                    <div class="dashboard-info__card-heading">School Profile Progress</div>
                                </div>
                            </a>
                        </div>
                        <!-- Dashboard Info Card End -->
                    </div>
                </div>
            </div>
            @if ($school_details->is_mou == 2)
                <div class="small text-center text-black-50 pt-5">
                    <p style="color: red ; font-size:1.5rem"><span>Your free trial period until <span
                                style="font-weight: 500">{{ date('d-m-Y', strtotime($expiry_date)) }}</span>.</span></p>
                </div>
            @endif
            <!-- Dashboard Info End -->
            <div class="small text-center text-black-50 pt-5">Copyright © <?php echo date('Y'); ?> School Dekho. All
                rights reserved.</div>
        </div>
    </div>
    <!-- End Contentbar -->
@endsection
@push('js')
@endpush
