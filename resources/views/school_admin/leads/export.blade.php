@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">Export Leads</h4>
            <!-- Dashboard Tabs Start -->
            <div class="dashboard-tabs-menu">
                <ul>
                    <li><a href="{{ route('schooladmin.leads.all') }}">All Leads</a></li>
                    <li><a class="active" href="{{ route('schooladmin.lead.export') }}">Leads Export</a></li>
                </ul>
            </div>
            <!-- Dashboard Tabs End -->
            <!-- Dashboard Announcement Start -->
            <div class="dashboard-announcement">
                <!-- Dashboard Announcement Box Start -->
                <div class="dashboard-content-box">
                    <!-- Dashboard Announcement Add Start -->
                    <div class="dashboard-announcement-add">
                        <div class="dashboard-announcement-add__content-wrap">
                            <div class="dashboard-announcement-add__icon">
                                {{ $new_lead_count }}
                            </div>
                            <div class="dashboard-announcement-add__content">
                                <small> New Leads Available</small>
                                <p><strong>Kindly download the leads by clicking the export button.</strong></p>
                            </div>
                        </div>
                        {{-- <div class="dashboard-announcement-add__btn">
                            <button class="btn btn-hover-primary btn-primary">Export Now</button>
                        </div> --}}
                    </div>
                    <!-- Dashboard Announcement Add End -->
                </div>
                <!-- Dashboard Announcement Box End -->
                @if (session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <!-- Dashboard Announcement Box Start -->
                <div class="dashboard-content-box">
                    <form method="post" class="mt-3" action="{{ route('schooladmin.lead.export.save') }}">
                        {{ csrf_field() }}
                        <div class="row gy-4">
                            <h5>Custom Leads Export</h5>
                            <div class="col-xxl-4 col-lg-4 col-sm-6">
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">From</label>
                                    <input type="text" class="form-control filter_start_date" autocomplete="off"
                                        readonly="" name="start_date" placeholder="Select Statring Date">
                                    <span class="form-icon">
                                        <i class="far fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-4 col-sm-6">
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">To</label>
                                    <input type="text" class="form-control filter_start_date" autocomplete="off"
                                        readonly="" name="end_date" placeholder="Select Ending Date">
                                    <span class="form-icon">
                                        <i class="far fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-4 col-sm-6">
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">Status</label>
                                    <select class="form-select" name="lead_type">
                                        <option value="9">All</option>
                                        <option value="0">New Leads</option>
                                        <option value="1">Interested</option>
                                        <option value="2">Not Interested</option>
                                        <option value="3">No Response</option>
                                        <option value="4">Admitted</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">Select School</label>
                                    <select class="form-select" name="school_id">
                                        @foreach ($school_claims as $claim)
                                            <option value="{{ $claim->school->id }}">{{ $claim->school->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="col-xxl-4 col-lg-4 col-sm-6">
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Sorted By</label>
                                <select class="form-select">
                                    <option>All</option>
                                    <option>New Leads</option>
                                    <option>A-Z</option>
                                    <option>By Status</option>
                                    <option>By Academic Session</option>
                                </select>
                            </div>
                        </div> --}}
                            <div class="col-lg-12">
                                <div class="widget-filter__item">
                                    <input id="categories13" type="checkbox" name="agree">
                                    <label for="categories13">I agree to the <a href="#">terms & conditions</a> of
                                        School Dekho for downloading the leads file.</label>
                                </div>
                                @if (sizeof($payment_status))
                                    <div class="dashboard-announcement-add__btn mt-3">
                                        <button class="btn btn-hover-primary btn-light" type="submit">Export Now</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Dashboard Announcement Box End -->
            </div>
            <!-- Dashboard Announcement End -->
        </div>
    </div>
    <!-- Dashboard Content End -->
    <div class="small text-black-50 pt-5 text-center">Copyright © <?php echo date('Y'); ?> School Dekho. All rights reserved.
    </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->
@push('js')
@endpush
