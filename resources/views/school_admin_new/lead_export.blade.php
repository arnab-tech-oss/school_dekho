@extends("layouts.schooladmin.app")

@section("title", "School Dashboard")

@push("css")
@endpush
{{-- <div class="dashboard-content"> --}}
@section("content")
    <div class="dashboard-content">

        <div class="container">
            <h4 class="dashboard-title">Export Leads</h4>

            <!-- Dashboard Tabs Start -->
            <div class="dashboard-tabs-menu">
                <ul>
                    <li><a href="{{ route("schooladmin.all_leads") }}">All Leads</a></li>
                    <li><a class="active" href="{{ route("schooladmin.lead_export") }}">Leads Export</a></li>
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
                                12
                            </div>
                            <div class="dashboard-announcement-add__content">
                                <small> New Leads Available</small>
                                <p><strong>Kindly download the leads by clicking the export button.</strong></p>
                            </div>
                        </div>

                        <div class="dashboard-announcement-add__btn">
                            <button class="btn btn-hover-primary btn-primary">Export Now1</button>
                        </div>

                    </div>
                    <!-- Dashboard Announcement Add End -->

                </div>
                <!-- Dashboard Announcement Box End -->

                <!-- Dashboard Announcement Box Start -->
                <div class="dashboard-content-box">
                    <div class="row gy-4">
                        <h5>Custom Leads Export</h5>

                        <!-- <div class="col-xxl-2 col-lg-3 col-sm-6">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">Status</label>
                                                <select class="form-select">
                                                    <option>All</option>
                                                    <option>Interested</option>
                                                    <option>Not Interested</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-lg-3 col-sm-6">
                                            <div class="dashboard-content__input">
                                                <label class="form-label-02">Sorted By</label>
                                                <select class="form-select">
                                                    <option>New Leads</option>
                                                    <option>A-Z</option>
                                                    <option>By Status</option>
                                                    <option>By Academic Session</option>
                                                </select>
                                            </div>
                                        </div> -->
                        <div class="col-xxl-2 col-lg-2 col-sm-6">
                            <div class="dashboard-content__input">
                                <label class="form-label-02">From</label>
                                <input type="text" class="form-control filter_start_date" autocomplete="off"
                                    readonly="">
                                <span class="form-icon">
                                    <i class="far fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-lg-2 col-sm-6">
                            <div class="dashboard-content__input">
                                <label class="form-label-02">To</label>
                                <input type="text" class="form-control filter_start_date" autocomplete="off"
                                    readonly="">
                                <span class="form-icon">
                                    <i class="far fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Select School</label>
                                <select class="form-select">
                                    <option value="">All</option>
                                    <option value="">Stem World School</option>
                                    <option value="">St. Claret School New Barrackpore</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-lg-2 col-sm-6">
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Status</label>
                                <select class="form-select">
                                    <option>All</option>
                                    <option>Interested</option>
                                    <option>Not Interested</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-lg-2 col-sm-6">
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
                        </div>
                        <div class="col-lg-12">
                            <div class="widget-filter__item">
                                <input id="categories13" type="checkbox">
                                <label for="categories13">I agree to the <a href="#">terms & conditions</a> of
                                    School Dekho for downloading the leads file</label>
                            </div>

                            <div class="dashboard-announcement-add__btn mt-3">
                                <button class="btn btn-hover-primary btn-light">Export Now</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Dashboard Announcement Box End -->
            </div>
            <!-- Dashboard Announcement End -->
        </div>

    </div>
    <!-- Dashboard Content End -->
    <div class="small text-black-50 pt-5 text-center">Copyright © <?php echo date("Y"); ?> School Dekho. All rights reserved.
    </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->

@push("js")
@endpush
