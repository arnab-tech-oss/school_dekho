@extends("layouts.admin.app")

@section("title", "Admin Dashboard")

@push("css")
@endpush

@section("content")
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Query for Councillor</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <!--<a href="{{ route("admin.lead.manual") }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Lead</a>-->
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->

    <!-- Start row -->

    <!-- Start col -->

    <!-- End col -->
    <!-- Start col -->
    <style>
        .filter {
            display: flex;
            margin: 5px;
        }

        .filter-item {
            margin: 10px;
            width: 300px;
        }
    </style>
    <div class="contentbar">
        {{-- <div class="col-md-6"> --}}
        <div class="card m-b-10">
            <div class="card-header">
                <h5 class="card-title">All Front Enquiry List</h5>
            </div>

            <div class="card-body">

                <table id="school-table" class="table-bordered table">
                    <thead>
                        <tr>
                            <th>Enquiry ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Date of Query</th>
                            <th>Message</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($all_contacts as $enquery)
                            <tr>
                                <td>{{ $enquery->id }}</td>
                                <td>{{ $enquery->name }}</td>
                                <td>{{ $enquery->phone }}</td>
                                <td>{{ $enquery->email }}</td>
                                <td>{{ $enquery->created_at->format("d-m-Y") }}</td>
                                <td
                                    style="  max-width: 400px; overflow-y: scroll; text-overflow: ellipsis; display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 5;
    line-clamp: 5;">
                                    {{ $enquery->message }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $all_contacts->render("pagination::bootstrap-4") }}
            {{-- </div> --}}
        </div>
        {{-- </div> --}}
    </div>
    <!-- End col -->

    <!-- End row -->

    <!-- End Contentbar -->

@endsection

@push("js")
    <script type="text/javascript">
        $(document).ready(function() {
            $('.example').select2();
        });
    </script>
@endpush
