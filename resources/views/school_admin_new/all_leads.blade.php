@extends("layouts.schooladmin.app")

@section("title", "School Dashboard")

@push("css")
@endpush
{{-- <div class="dashboard-content"> --}}
@section("content")
    <div class="dashboard-content">

        <div class="container">
            <h4 class="dashboard-title">Leads Centre</h4>

            <!-- Dashboard Tabs Start -->
            <div class="dashboard-tabs-menu">
                <ul>
                    <li><a class="active" href="{{ route("schooladmin.all_leads") }}">All Leads</a></li>
                    <li><a href="{{ route("schooladmin.lead_export") }}">Leads Export</a></li>
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
                                <p><strong>Please follow up as soon as possible.</strong></p>
                            </div>
                        </div>

                        <div class="dashboard-announcement-add__btn">
                            <button class="btn btn-primary btn-hover-secondary">Follow Up Now</button>
                        </div>

                    </div>
                    <!-- Dashboard Announcement Add End -->

                </div>
                <!-- Dashboard Announcement Box End -->

                <!-- Dashboard Announcement Box Start -->
                <div class="dashboard-content-box">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div class="dashboard-content__input">
                                <label class="form-label-02">Select School</label>
                                <select class="form-select">
                                    <option value="">All</option>
                                    <option value="">Stem World School</option>
                                    <option value="">St. Claret School New Barrackpore</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-lg-3 col-sm-6">
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
                        </div>
                        <!-- <div class="col-xxl-4 col-lg-3 col-sm-6">
                                                    <div class="dashboard-content__input">
                                                        <label class="form-label-02">Date</label>
                                                        <input type="text" class="form-control filter_start_date" autocomplete="off" readonly="">
                                                        <span class="form-icon">
                                                            <i class="far fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div> -->
                    </div>
                </div>
                <!-- Dashboard Announcement Box End -->

                <!-- Dashboard Question & Answer Start -->
                <div class="dashboard-question-answer">
                    <div class="dashboard-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="question">
                                        <div class="dashboard-content__input">
                                            <!-- <label class="form-label-02">Show</label> -->
                                            <select class="form-select admin-drop-width">
                                                <option>1-10</option>
                                                <option>1-50</option>
                                                <option>1-100</option>
                                                <option>1-500</option>
                                            </select>
                                        </div>
                                    </th>
                                    <th class="student">Leads</th>
                                    <th class="student">Last Followed On</th>
                                    <th class="courses">Status</th>
                                    <th class="action"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">Sl. No.</div>
                                        <div class="dashboard-table__text">
                                            <h3 class="dashboard-table__question-title dashboard-lead-number">01</h3>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__questioner-info">
                                            <div class="questioner-info">
                                                <h5 class="questioner-name">Swati Anand</h5>
                                                <span class="question-post-date small">Avalible on: 03-05-2023</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">Latest Followed on</div>
                                        <div class="dashboard-table__text">03-05-2023</div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">Status</div>
                                        <div class="dashboard-table__text dashboard-table__result new_lead">New Lead</div>
                                    </td>

                                    <td>
                                        <div class="dashboard-table__text">
                                            <a class="action" data-bs-toggle="modal" data-bs-target="#followUp"
                                                href="#"><i class="far fa-eye"></i> <span class="text">Follow Up
                                                </span></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">Sl. No.</div>
                                        <div class="dashboard-table__text">
                                            <h3 class="dashboard-table__question-title dashboard-lead-number">07</h3>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__questioner-info">
                                            <div class="questioner-info">
                                                <h5 class="questioner-name">Somnath Mukherjee</h5>
                                                <span class="question-post-date small">Avalible on: 02-05-2023</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">Latest Followed on</div>
                                        <div class="dashboard-table__text">03-05-2023</div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">Status</div>
                                        <div class="dashboard-table__text dashboard-table__result pass">Interested</div>
                                    </td>

                                    <td>
                                        <div class="dashboard-table__text">

                                            <a class="action" data-bs-toggle="modal" data-bs-target="#followUp"
                                                href="#"><i class="far fa-eye"></i> <span class="text">Follow Up
                                                </span></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">Sl. No.</div>
                                        <div class="dashboard-table__text">
                                            <h3 class="dashboard-table__question-title dashboard-lead-number">97</h3>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__questioner-info">
                                            <div class="questioner-info">
                                                <h5 class="questioner-name">Ayub Md. Faisal Hossain</h5>
                                                <span class="question-post-date small">Avalible on: 02-05-2023</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">Latest Followed on</div>
                                        <div class="dashboard-table__text">03-05-2023</div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">Status</div>
                                        <div class="dashboard-table__text dashboard-table__result review">Under Review</div>
                                    </td>

                                    <td>
                                        <div class="dashboard-table__text">
                                            <a class="action" data-bs-toggle="modal" data-bs-target="#followUp"
                                                href="#"><i class="far fa-eye"></i> <span class="text">Follow Up
                                                </span></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">Sl. No.</div>
                                        <div class="dashboard-table__text">
                                            <h3 class="dashboard-table__question-title dashboard-lead-number">134</h3>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__questioner-info">
                                            <div class="questioner-info">
                                                <h5 class="questioner-name">Mr. Kabir Khan</h5>
                                                <span class="question-post-date small">Avalible on: 02-05-2023</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">Latest Followed on</div>
                                        <div class="dashboard-table__text">03-05-2023</div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">Status</div>
                                        <div class="dashboard-table__text dashboard-table__result fail">Not Interested
                                        </div>
                                    </td>

                                    <td>
                                        <div class="dashboard-table__text">
                                            <a class="action" data-bs-toggle="modal" data-bs-target="#followUp"
                                                href="#"><i class="far fa-eye"></i> <span class="text">Follow Up
                                                </span></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- Dashboard Announcement End -->

        </div>

    </div>
    <!-- Dashboard Content End -->
    <!-- Page Pagination Start -->
    <div class="page-pagination">
        <ul class="pagination justify-content-center">
            <li><a class="active" href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">7</a></li>
            <li><a href="#"><i class="far fa-angle-double-right"></i></a></li>
        </ul>
    </div>
    <!-- Page Pagination End -->

    <div class="small text-black-50 pt-5 text-center">Copyright © <?php echo date("Y"); ?> School Dekho. All rights reserved.
    </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->

@push("js")
@endpush