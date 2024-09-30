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
                    <li><a class="active" href="{{ route('schooladmin.prioritysupport') }}">Ticket Generation</a></li>
                    <li><a href="{{ route('schooladmin.ticket_history') }}">Ticket History</a></li>
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
                                    <label class="form-label-02">Select Issue Type</label>
                                    <select class="form-select" name="issue">
                                        <option value="General">General</option>
                                        <option value="Lead Related">Lead Related</option>
                                        <option value="School Related">School Related</option>

                                    </select>
                                </div>
                                <div class="row gy-4">
                                    <div class="col-md-12">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Description of the Issue: </label>
                                            <textarea class="form-control" name="description"></textarea>
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Screenshot or Attachment</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                </div>
                            </div>
                            <!-- Dashboard Settings Info End -->
                        </div>
                    </div>
                    <div class="dashboard-settings__btn">
                        <button type="submit" class="btn btn-primary btn-hover-secondary">Submit </button>
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
