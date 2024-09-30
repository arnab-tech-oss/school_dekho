@extends('layouts.lead.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <style>
        .dropbtn {
            background-color: #3498DB;
            color: white;
            padding: 8px;
            font-size: 12px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover,
        .dropbtn:focus {
            background-color: #2980B9;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            width: 90px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            text-align: left;
            right: 12px;
            margin-top: 4px;
            border-radius: 5px;
        }

        .dropdown-content a {
            color: black;
            padding: 6px 6px;
            /* margin-left: 10px; */
            text-decoration: none;
            display: block;
            width: auto;

        }

        .dropdown-content a:hover {
            background-color: rgb(213, 222, 230);
        }

        .show {
            display: block;
        }

        .lead_select {
            display: flex;
        }
    </style>
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">List Leads</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Lead List</li>
                    </ol>
                </div>
            </div>
            {{--  --}}
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <button href="" class="btn btn-primary-rgba dropbtn" onclick="myFunction()"><i
                            class="feather icon-plus mr-2"></i>Add Lead</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="{{ route('lead.lead.add') }}">Single</a>
                        <a href="{{ route('lead.lead.bulk') }}">Bulk</a>
                        <a href="{{ route('lead.lead.direct') }}">Direct</a>
                    </div>
                </div>
            </div>
            <script>
                /* When the user clicks on the button,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            toggle between hiding and showing the dropdown content */
                function myFunction() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                    if (!event.target.matches('.dropbtn')) {
                        var dropdowns = document.getElementsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.classList.contains('show')) {
                                openDropdown.classList.remove('show');
                            }
                        }
                    }
                }
            </script>
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

            <div class="card-header lead_select">

                <h5 style="width: 85px; padding-top: 10px;text-align: " class="card-title">All Leads</h5>






                {{-- <form class="d-flex" action="{{ route('lead.lead.name.search') }}" method="post">
                    <h5 style="    width: 85px; padding-top: 10px;text-align: " class="card-title">All Leads</h5>
                    <div class="ml-4">
                        <input type="text" class="form-control" placeholder="Enter name of lead" name="lead_name">
                    </div>
                    <div style="padding-left: 20px">
                        <input type="submit" value="Lead Search" class="btn btn-primary">
                    </div>

                </form>
                <form method="get" action="{{ route('lead.lead.search') }}">
                    <div style="padding-left: 40px;">
                        <select name="counselor_id" id="" class="form-control" required>
                            <option value="">Select Counselor</option>
                            @foreach ($counselors as $counselor)
                                <option value="{{ $counselor->id }}" @if (request()->get('counselor_id') == $counselor->id) selected @endif>
                                    {{ $counselor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="padding-left: 100px;"><input type="date" name="form_date" id=""
                            class="form-control" required
                            @if (request()->get('form_date') != null) value =  {{ request()->get('form_date') }} @endif>
                    </div>
                    <div style="padding-left: 100px;"><input type="date" name="to_date" id=""
                            class="form-control" required
                            @if (request()->get('to_date') != null) value =  {{ request()->get('to_date') }} @endif>
                    </div>
                    <div style="padding-left: 15px;">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form> --}}
            </div>
            <div class="row">
                <form class="d-flex  col " action="{{ route('lead.lead.name.search') }}" method="get">

                    <div class="ml-4">
                        <input type="text" class="form-control" placeholder="Enter name of lead" name="lead_name" required>
                    </div>
                    <div style="padding-left: 20px">
                        <input type="submit" value="Lead Search" class="btn btn-primary">
                    </div>

                </form>
            </div>

            <div class="row">
                <form style="margin-top: 10px;" class="d-flex   col" method="get"
                    action="{{ route('lead.lead.search') }}">
                    <div style="padding-left: 25px;">
                        <select name="counselor_id" id="" class="form-control" required>
                            <option value="">Select Counselor</option>
                            <option value="all_counselors">All Counselor</option>
                            @foreach ($counselors as $counselor)
                                <option value="{{ $counselor->id }}" @if (request()->get('counselor_id') == $counselor->id) selected @endif>
                                    {{ $counselor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="padding-left: 100px;"><input type="date" name="form_date" id=""
                            class="form-control" required
                            @if (request()->get('form_date') != null) value =  {{ request()->get('form_date') }} @endif>
                    </div>
                    <div style="padding-left: 100px;"><input type="date" name="to_date" id=""
                            class="form-control" required
                            @if (request()->get('to_date') != null) value =  {{ request()->get('to_date') }} @endif>
                    </div>
                    <div style="padding-left: 15px;">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>

            <div class="card-body">
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Counselor</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leads as $lead)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lead->name }}</td>
                                    @if (isset($lead->counselor_lead[0]))
                                        <td>{{ $lead->counselor_lead[0]?->counselor?->name }}</td>
                                    @else
                                        <td>Not assigned</td>
                                    @endif
                                    <td>
                                        @if ($lead->status == 0)
                                            <span style="color:rgb(219, 154, 154)">Untouched</span>
                                        @elseif($lead->status == 1)
                                            <span style="color:rgb(132, 225, 132)">Interested</span>
                                        @elseif($lead->status == 2)
                                            <span style="color:rgb(177, 19, 19)">Not Interested</span>
                                        @elseif($lead->status == 3)
                                            <span style="color:rgb(214, 214, 59)">No Response</span>
                                        @elseif($lead->status == 4)
                                            <span style="color:rgb(61, 89, 61)">Admitted</span>
                                        @elseif($lead->status == 5)
                                            <span style="color:rgb(20, 237, 20)">Admitted through School Dekho</span>
                                        @elseif($lead->status == 6)
                                            <span style="color:black">Assigned</span>
                                        @endif
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($lead->created_at)->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('lead.lead.details', [$lead->id]) }}"
                                            class="btn btn-primary">View</a>
                                        <a href="{{ route('lead.lead.edit', [$lead->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $leads->appends($_GET)->render('pagination::bootstrap-4') }}
            </div>
        </div>
        {{-- </div> --}}
    </div>
    <!-- End col -->

    <!-- End row -->

    <!-- End Contentbar -->




@endsection

@push('js')
@endpush
