@extends('layouts.whatsapp.app')
@section('title', 'Admin Dashboard')
@push('css')
@endpush
@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">List Blogs</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">List Message</li>
                    </ol>
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
            <div class="card-header">
                <h5 class="card-title">All Messages</h5>
            </div>
            <div class="card-body">
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message_list as $message)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $message->number }}</td>
                                    <td>
                                        @if ($message->status)
                                            <span class="btn btn-success"> Success </span>
                                        @else
                                            <span class="btn btn-danger"> Fail </span>
                                        @endif
                                    </td>
                                    <td>{{ App\Core\Helper::GetDate($message->created_at) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- {{ $allblogs->render('pagination::bootstrap-4') }} --}}
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
