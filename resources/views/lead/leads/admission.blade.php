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
            <div class="card-header">
                <h5 class="card-title">All Leads</h5>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admitted_leads as $lead)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lead->name }}</td>
                                    @if (isset($lead->counselor_lead[0]))
                                        <td>{{ $lead->counselor_lead[0]?->counselor?->name }}</td>
                                    @else
                                        <td>Not assigned</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('lead.lead.details', [$lead->id]) }}"
                                            class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $admitted_leads->render('pagination::bootstrap-4') }}
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
