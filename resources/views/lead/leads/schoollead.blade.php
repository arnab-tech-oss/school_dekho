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

        /* .lead_select {
                                                                                                                                                display: flex;
                                                                                                                                            } */
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

                <h5 style=" padding-top: 10px;text-align: " class="card-title">School Wise Leads</h5>
                <form method="get" action="{{ route('lead.lead.schoolwise') }}">

                    <div class="filter" style="display: flex">
                        <style>
                            .select2-selection__rendered {
                                width: 300px !important;
                            }
                        </style>
                        <div class="filter-item">
                            <label for="select school">Select School</label>
                            <select class="form-control example" style="    width: 300px !important;  margin-top: 40px;"
                                name="mou_school" class="form-control" required>
                                <option value="">--select type--</option>
                                <option value="non_mou">Non Mou School</option>
                                <option value="mou">Mou School</option>
                            </select>
                        </div>
                        <div class="filter-item" style="margin-top: 30px;">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>

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
                                <th>School Name</th>
                                <th>Address</th>
                                <th>Total Leads Transfer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($school_wise_leads as $school)
                                {{-- @if (sizeof($lead->transfer_lead) > 0) --}}
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $school->name }}</td>
                                    @if (isset($school->school_address[0]?->address))
                                        <td>{{ $school->school_address[0]?->address }}</td>
                                    @endif
                                    <td>{{ sizeof($school->school_leads) }}</td>
                                </tr>
                                {{-- @endif --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $school_wise_leads->appends($_GET)->render('pagination::bootstrap-4') }}
            </div>
        </div>
        {{-- </div> --}}
    </div>
    <!-- End col -->

    <!-- End row -->

    <!-- End Contentbar -->

@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.example').select2();
        });
    </script>
@endpush
