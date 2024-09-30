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
    </style>
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">List Blogs</h4>
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
                    <button href="" class="btn btn-primary-rgba dropbtn" onclick="myFunction2()"><i
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
                function myFunction2() {
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
            <div class="card-header">
                <h5 class="card-title">All Leads</h5>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success col-md-12">
                    {{ Session::get('message') }}
                    @php
                        Session::forget('message');
                    @endphp
                </div>
            @endif
            <div class="card-body">
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
                <form action="{{ route('lead.lead.assign.counselor') }}" method="POST">
                    <div class="table-responsive">
                        <select name="counselor" id="" class="form-control" required>
                            <option value="">Select Counselor</option>
                            @foreach ($counselors as $counselor)
                                <option value="{{ $counselor->id }}">{{ $counselor->name }}</option>
                            @endforeach
                        </select>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Select</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Interested for</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($assignleads as $lead)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><input type="checkbox" name="lead[]" id="{{ $loop->iteration }}"
                                            onclick="myFunction('{{ $loop->iteration }}')" value={{ $lead->id }}>
                                    </td>
                                    <td>{{ $lead->name }}</td>
                                    <td>{{ $lead->location }}</td>
                                    <td>{{ $lead->admission_for }}</td>
                                    <td>
                                        <a href="{{ route('lead.lead.details', [$lead->id]) }}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        <div><button type="submit" class="btn btn-primary" id="assign"
                                style="display:none;">Assign</button></div>
                    </div>
                </form>
                {{ $assignleads->render('pagination::bootstrap-4') }}
            </div>
        </div>
        <script>
            var leads = [];

            function myFunction(x) {
                if (document.getElementById(x).checked) {
                    leads.push(x);
                }
                if (document.getElementById(x).checked == false) {
                    const index = leads.indexOf(x);
                    if (index > -1) {
                        leads.splice(index, 1);
                    }
                }
                console.log(leads);
                if (leads.length > 0) {
                    document.getElementById('assign').style.display = "block";
                }
                if (leads.length == 0) {
                    document.getElementById('assign').style.display = "none";
                }
            }
        </script>
        {{-- </div> --}}
    </div>
    <!-- End col -->

    <!-- End row -->

    <!-- End Contentbar -->




@endsection

@push('js')
@endpush
