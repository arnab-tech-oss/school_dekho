@extends('layouts.lead.app')

@section('title', 'Admin Dashboard')

@push('css')
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-12">
                <h4 class="page-title">School Details</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.leads.all') }}">Leads</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lead Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Container -->
    <div class="contentbar">
        {{-- <div class="col-md-6"> --}}



        <div class="container px-4 mx-auto">

            <div class="p-6 m-20 bg-white rounded shadow">
                {!! $chart->container() !!}
            </div>

        </div>
        <script src="{{ $chart->cdn() }}"></script>

        {{ $chart->script() }}


        <br>
        <div class="card m-b-24">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">Lead details</h4>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                        <div class="widgetbar">

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Lead Name</th>
                                <th>Remarks</th>
                                <th>Date Of calling</th>
                                <th>Time</th>
                                <th>Next Follow Up</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($remarks as $remark)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $remark?->lead?->name }}</td>
                                    <td>{{ $remark?->remarks }}</td>
                                    <td>{{ $remark?->date_of_calling }}</td>
                                    <td>{{ Carbon\Carbon::parse($remark->created_at)->format('g:i:s A') }}</td>
                                    <td>{{ $remark?->next_follow_up }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <div class="card m-b-24">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">Lead Transfer</h4>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                        <div class="widgetbar">

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Lead Name</th>
                                <th>School Name</th>
                                <th>Date of Tarnsfer</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($counselor_transfer_leads as $lead_transfer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lead_transfer?->lead_transfer?->name }}</td>
                                    <td>{{ $lead_transfer->school->name }}</td>
                                    <td>{{ Carbon\Carbon::parse($lead_transfer->created_at)->format('d-m-y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($lead_transfer->created_at)->format('g:i:s A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
    </div>


    <!-- End Container -->


@endsection

@push('js')
@endpush
