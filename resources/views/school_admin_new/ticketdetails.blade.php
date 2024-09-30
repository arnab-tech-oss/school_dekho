@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">Support</h4>
            <div class="dashboard-tabs-menu">
                <ul>
                    <li><a  href="{{ route('schooladmin.prioritysupport') }}">Ticket Generation</a></li>
                    <li><a href="{{ route('schooladmin.ticket_history') }}">Ticket History</a></li>
                    <li><a class="active" href="{{ route('schooladmin.ticket_history') }}">Ticket Details</a></li>
                </ul>
            </div>
            <!-- Dashboard Settings Start -->
            <div class="dashboard-settings">
                <form method="POST" action="{{ route('schooladmin.ticket_generate') }}" enctype="multipart/form-data">
                    <div class="row gy-6">
                        <div class="col-lg-12">
                            <!-- Dashboard Settings Info Start -->
                            <div class="dashboard-content-box">
                                <h4 class="dashboard-content-box__title">Support Ticket Generation </h4>
                                <!-- <p>Provide your details below to create your account profile</p> -->
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">Issue Type</label>
                                    {{ $ticket_details?->issue }}
                                </div>
                                <div class="row gy-4">
                                    <div class="col-md-12">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Description of the Issue: </label>
                                            {{ $ticket_details?->description }}
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Screenshot or Attachment</label>
                                            @if ($ticket_path != '')
                                                <img src="{{ $ticket_path }}" alt="">
                                            @else
                                                <span style="color:blue">No Attachment</span>
                                            @endif
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                </div>
                            </div>
                            <!-- Dashboard Settings Info End -->
                        </div>
                    </div>
                </form>
            </div>
            <!-- Dashboard Settings End -->
        </div>
    </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->
@push('js')
@endpush
