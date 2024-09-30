@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content') 
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">List School</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">List School</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('admin.school.add') }}" class="btn btn-primary-rgba"><i
                            class="feather icon-plus mr-2"></i>Add School</a>
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
    <div class="contentbar">
        {{-- <div class="col-md-6"> --}}
        <div class="card m-b-10">
            <div class="card-header col-12">
                <h5 class="card-title">All Registered Schools</h5>
                <form method="GET" action="{{ route('admin.school.list') }}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="search" class="form-control" name="q" value="{{ isset($q) ? $q : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn-md btn-primary" style="padding: 6px;">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <form method="GET" action="{{ route('admin.school.list') }}" class="form-row d-flex  align-items-center px-4"
                style="gap: 15px"> 
                <div class="form-group "> 
                    <label for="">State</label>
                    <select class="form-control" name="state_id" id="state_dropdown" style="min-width: 150px" required>
                        <option value="">Select State</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->state }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ">
                    <label for="">District</label>
                    <select class="form-control" name="district_id" id="district_dropdown" style="min-width: 150px"
                        required>

                    </select>
                </div>
                <div style="margin-top: 30px" class="form-group">
                    <button type="submit" name="search" value="search" class="btn btn-primary">Search</button>
                </div>
                <div class="form-group ">
                    <button style="margin-top: 30px" type="submit" name="export" value="export"
                        class="btn btn-primary">Export</button>
                </div>

            </form>
            <form method="GET" action="{{ route('admin.school.list') }}" class="form-row d-flex  align-items-center px-4"
                style="gap: 15px">
                <div class="form-group ">
                    <label for="">Mou/Free School</label>
                    <select class="form-control" name="mou_option"  style="min-width: 150px" required>
                        <option value="">Select Mou/Free School</option>
                        <option value="1">Mou</option>
                        <option value="2">Free Mou</option>
                    </select>
                </div>
                <div style="margin-top: 30px" class="form-group">
                    <button type="submit" name="mou" value="search" class="btn btn-primary">Search</button>
                </div>

            </form>
            <div class="card-body">
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
                {{-- <div class="table-responsive"> --}}
                <table id="school-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>School Name</th>
                            <th>Address</th>
                            @if (Auth::user()->role == 1 && $complete)
                                <th>User</th>
                            @endif
                            <th>View</th>
                            @if (isset($claim))
                                <th>claim</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schoollist as $list)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $list->name }}</td>
                                <td>
                                    @if ($list->address)
                                        {{ $list->address->address }}
                                    @endif
                                </td>
                                @if (Auth::user()->role == 1 && $complete)
                                    <td>{{ $list->user->name }}</td>
                                @endif
                                <td>
                                    <a href="{{ route('admin.school.details', $list->id) }}" class="btn btn-info">View</a>
                                    @if ($list->is_verify == 0)
                                        <a href="{{ route('admin.school.verify', $list->id) }}" class="btn btn-success">Add
                                            Blue Tick</a>
                                    @else
                                        <a href="{{ route('admin.school.remove.verification', $list->id) }}"
                                            class="btn btn-danger">Remove Blue Tick</a>
                                    @endif
                                </td>
                                @if (isset($claim))
                                    <td>
                                        <a href="{{ route('admin.school.claim.details', $list->id) }}"
                                            class="btn btn-info">Claim</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $schoollist->appends($_GET)->render('pagination::bootstrap-4') }}
            {{-- </div> --}}
        </div>
        {{-- </div> --}}
    </div>
    <!-- End col -->

    <!-- End row -->

    <!-- End Contentbar -->

@endsection

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#state_dropdown').on('change', function() {
                var state_id = $(this).val();
                $('#district_dropdown').html('<option value="">-- Select State First --</option>');
                $.ajax({
                    url: "{{ route('admin.district.list') }}",
                    type: "GET",
                    data: {
                        // _token: "{{ csrf_token() }}",
                        state_id: state_id
                    },
                    success: function(data) {
                        $('#district_dropdown').html(
                            '<option value="">-- Select District --</option>');
                        $.each(data, function(key, value) {
                            $('#district_dropdown').append('<option value="' + value
                                .id + '">' + value.district + '</option>');
                        })
                    }
                })
            })
        });
    </script>
@endpush
