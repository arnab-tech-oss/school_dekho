@extends('layouts.schooladmin.app')

@section('title', 'School Dashboard')

@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
    <div class="dashboard-content">

        <div class="container">
            <h4 class="dashboard-title">Account Settings</h4>

            <!-- Dashboard Settings Start -->
            <div class="dashboard-settings">

                <!-- Dashboard Tabs Start -->
                <div class="dashboard-tabs-menu">
                    <ul>
                        <li><a href="{{ route('schooladmin.account_settings') }}">Edit Profile</a></li>
                        <li><a class="active" href="{{ route('schooladmin.reset_password') }}">Reset Password</a></li>
                    </ul>
                </div>
                <!-- Dashboard Tabs End -->

                <form action="{{ route('schooladmin.reset_pass') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">

                            <!-- Dashboard Settings Info Start -->
                            <div class="dashboard-content-box dashboard-settings__info">

                                <h4 class="dashboard-settings__title">Reset Password</h4>

                                <div class="row gy-4">
                                    <div class="col-md-12">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Current Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">New Password</label>
                                            <input type="password" class="form-control" name="new_password">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Confirm New Password</label>
                                            <input type="password" class="form-control" name="new_confirm_password">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                </div>

                            </div>
                            <!-- Dashboard Settings Info End -->

                        </div>
                    </div>

                    <div class="dashboard-settings__btn">
                        <button class="btn btn-primary btn-hover-secondary">Reset Password</button>
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
