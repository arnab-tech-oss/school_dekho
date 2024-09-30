@extends('layouts.account.app')

@section('title', 'Bill Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">List Bills</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Original Bill List</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('account.add') }}" class="btn btn-primary-rgba"><i
                            class="feather icon-plus mr-2"></i>Add Bill</a>
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
                <h5 class="card-title">Original Bills</h5>
            </div>
            <div class="card-body">
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6> --}}
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>School Name</th>
                                <th>Session</th>
                                <th>School Copy</th>
                                <th>Office Copy</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bills as $bill)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bill?->school?->name }}</td>
                                    <td>{{ $bill?->bill_session?->session }}</td>
                                    <td><a href="{{ route('account.schoolreceipt.original', [$bill->id]) }}" target='_blank'
                                            class="btn btn-primary" target='blank'>View</a></td>
                                    <td><a href="{{ route('account.officereceipt.original', [$bill?->id]) }}"
                                            target='_blank' class="btn btn-primary" target='blank'>View</a></td>
                                    <td>
                                        @if ($bill->status == 1)
                                            <a href="{{ route('account.original.edit', [$bill->id]) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ route('account.original.cancel', [$bill->id]) }}"
                                                onclick="return confirm('Do you want to cancel this bill?')"
                                                class="btn btn-danger">Cancel</a>
                                        @else
                                            <a href="" class="btn btn-danger">Canceled</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $bills->render('pagination::bootstrap-4') }}
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
