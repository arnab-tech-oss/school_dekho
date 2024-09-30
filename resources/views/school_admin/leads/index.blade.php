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
                    <li><a class="active" href="{{ route("schooladmin.leads.all") }}">All Leads</a></li>
                    @if (sizeof($payment_status) > 0)
                        <li><a href="{{ route("schooladmin.lead.export") }}">Leads Export</a></li>
                    @endif
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
                    <form method="GET" action="{{ route("schooladmin.leads.filter") }}">
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">Select School</label>
                                    <select class="form-select" name="school_id">
                                        @foreach ($school_claims as $claim)
                                            <option value="{{ $claim->school->id }}">{{ $claim->school->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-lg-3 col-sm-6">
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
                            <div class="col-xxl-2 col-lg-3 col-sm-6">
                                <div style="margin-top: 32px" class="dashboard-content__input">
                                    <div class="dashboard-announcement-add__btn">
                                        <button type="submit" class="btn btn-secondary btn-hover-secondary">View
                                            Leads</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Dashboard Announcement Box End -->
                <!-- Dashboard Question & Answer Start -->
                <div class="dashboard-question-answer">
                    <div class="dashboard-table table-responsive">
                        @foreach ($school_claims as $school_claim)
                            @if (sizeof($payment_status) > 0)
                                @foreach ($payment_status as $payment)
                                    @if ($payment->school_id == $school_claim->school_id)
                                        <table id="school-table" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="question">ID #</th> 
                                                    <th class="student">Leads</th>
                                                    <th class="student">Last Followed On</th>
                                                    <th class="courses">Status</th>
                                                    <th class="action"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($leads as $lead)

                                                    @if ($school_claim->school_id == $lead["school_id"])
                                                        <tr>
                                                            <td>
                                                                <div class="dashboard-table__mobile-heading">Sl. No.</div>
                                                                <div class="dashboard-table__text">
                                                                    <h3
                                                                        class="dashboard-table__question-title dashboard-lead-number">
                                                                        {{ $lead["id"] }}</h3>
                                                                </div>
                                                            </td>
                                                            @if ($lead["lead"]["student_name"])
                                                                <td>
                                                                    <div class="dashboard-table__questioner-info">
                                                                        <div class="questioner-info">
                                                                            <h5 class="questioner-name">
                                                                                {{ $lead["lead"]["student_name"] }}</h5>
                                                                            <span class="question-post-date small">Created
                                                                                on:
                                                                                {{ Carbon\Carbon::parse($lead["lead"]["created_at"])->format("d-m-Y") }}</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <div class="dashboard-table__questioner-info">
                                                                        <div class="questioner-info">
                                                                            @php
                                                                                $x = $lead["lead"]["application"];
                                                                                if(isset($x[0]?->elements[0]?->value)){
                                                                                $val = $x[0]?->elements[0]?->value;
                                                                                echo '<h5 class="questioner-name">' .
                                                                                    $val .
                                                                                    "</h5>";
                                                                                }
                                                                            @endphp
                                                                            <span class="question-post-date small">Created
                                                                                on:
                                                                                {{ Carbon\Carbon::parse($lead["lead"]["created_at"])->format("d-m-Y") }}</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            @endif
                                                            <td>
                                                                <div class="dashboard-table__mobile-heading">Last Followed
                                                                    on</div>
                                                                <div class="dashboard-table__text">
                                                                    @php
                                                                        if ($lead["remarks"] == null) {
                                                                            echo "-";
                                                                        } else {
                                                                            echo \Carbon\Carbon::parse(
                                                                                $lead["remarks"][0]["created_at"],
                                                                            )->format("d-m-Y");
                                                                        }
                                                                    @endphp
                                                                </div>
                                                            </td>
                                                            <td>
                                                                @if ($lead["status"] == 0)
                                                                    <div class="dashboard-table__mobile-heading">Status
                                                                    </div>
                                                                    <div
                                                                        class="dashboard-table__text dashboard-table__result new_lead">
                                                                        New Lead</div>
                                                                @elseif ($lead["status"] == 1)
                                                                    <div class="dashboard-table__mobile-heading">Status
                                                                    </div>
                                                                    <div
                                                                        class="dashboard-table__text dashboard-table__result pass">
                                                                        Interested</div>
                                                                @elseif ($lead["status"] == 2)
                                                                    <div class="dashboard-table__mobile-heading">Status
                                                                    </div>
                                                                    <div
                                                                        class="dashboard-table__text dashboard-table__result fail">
                                                                        Not Interested
                                                                    @elseif ($lead["status"] == 3)
                                                                        <div class="dashboard-table__mobile-heading">Status
                                                                        </div>
                                                                        <div
                                                                            class="dashboard-table__text dashboard-table__result review">
                                                                            No Response</div>
                                                                    @elseif ($lead["status"] == 4)
                                                                        <div class="dashboard-table__mobile-heading">Status
                                                                        </div>
                                                                        <div
                                                                            class="dashboard-table__text dashboard-table__result pass">
                                                                            Admitted</div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="dashboard-table__text">
                                                                    <a class="action"
                                                                        href="{{ route("schooladmin.lead.details", [$lead["lead"]["id"], $lead["school_id"]]) }}"><i
                                                                            class="far fa-eye"></i> <span
                                                                            class="text">Follow Up</span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                @endforeach
                            @else
                                <div class="card-body">
                                    <p>Lead for School : <b>{{ $school_claim->school->name }}</b></p>
                                    {{-- <p>Free trial remaining <b>{{ \Carbon\Carbon::parse($payment->validated_at)->diffForHumans() }}</b></p> --}}
                                    <table id="school-table" class="table-bordered table">
                                        <thead>
                                            <tr>
                                                <th>Lead ID#</th>
                                                <th>Student Name</th>
                                                <!--<th>Mobile Number</th>-->
                                                <!--<th>Location</th>-->
                                                <th>Admission Status</th>
                                                <th>Lead Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($leads as $lead)
                                                <tr>
                                                    <td>{{ $lead["lead"]["id"] }}</td>
                                                    @if ($lead["lead"]["student_name"])
                                                        <td>{{ $lead["lead"]["student_name"] }}</td>
                                                    @else
                                                        <td>
                                                            @php
                                                                $x = $lead["lead"]["application"];
                                                                $val = $x[0]->elements[0]->value;
                                                                echo $val;
                                                            @endphp
                                                        </td>
                                                    @endif
                                                    <td>
                                                        @php
                                                            if ($lead["lead"]["admission"] == "1") {
                                                                echo '<span class="badge badge-success-inverse">Yes</span>';
                                                            } else {
                                                                echo '<span class="badge badge-warning-inverse">No</span>';
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-info disabled">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Dashboard Announcement End -->
        </div>
    </div>
    <div class="small text-black-50 pt-5 text-center">Copyright © <?php echo date("Y"); ?> School Dekho. All rights reserved.
    </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->
@push("js")
@endpush

