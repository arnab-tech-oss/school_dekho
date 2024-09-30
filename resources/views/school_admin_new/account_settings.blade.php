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
                        <li><a class="active" href="{{ route('schooladmin.account_settings') }}">Edit Profile</a></li>
                        <li><a href="{{ route('schooladmin.reset_password') }}">Reset Password</a></li>
                    </ul>
                </div>
                <!-- Dashboard Tabs End -->

                <form method="post" action="{{ route('schooladmin.account_update') }}">
                    <div class="row gy-6">
                        <div class="col-lg-6">

                            <!-- Dashboard Settings Info Start -->
                            <div class="dashboard-content-box">

                                <h4 class="dashboard-content-box__title">Update Contact information</h4>
                                <p>Provide your details below to update your account profile</p>
                                <div class="row gy-4">
                                    <div class="col-md-12">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $account_details->name }}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Designation</label>
                                            <input type="text" class="form-control" name="designation"
                                                value="{{ $account_details->designation }}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Account Account details Start -->
                                        <div class="dashboard-content__input">
                                            <label class="form-label-02">Phone Number</label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $account_details->phone }}">
                                        </div>
                                        <!-- Account Account details End -->
                                    </div>

                                </div>

                            </div>
                            <!-- Dashboard Settings Info End -->

                        </div>
                        <div class="col-lg-6">

                            <!-- Dashboard Profile Start -->
                            <div class="dashboard-profile">
                                <h4 class="dashboard-content-box__title">My Profile</h4>
                                <hr>
                                <div class="dashboard-profile__item">
                                    <div class="dashboard-profile__heading">Registration Date</div>
                                    <div class="dashboard-profile__content">
                                        <p> {{ $account_details->created_at->format('d-M-Y') }} </p>
                                    </div>
                                </div>
                                <div class="dashboard-profile__item">
                                    <div class="dashboard-profile__heading">Name</div>
                                    <div class="dashboard-profile__content">
                                        <p>{{ $account_details->name }}</p>
                                    </div>
                                </div>
                                <div class="dashboard-profile__item">
                                    <div class="dashboard-profile__heading">Email</div>
                                    <div class="dashboard-profile__content">
                                        <p>{{ $account_details->email }}</p>
                                    </div>
                                </div>
                                <div class="dashboard-profile__item">
                                    <div class="dashboard-profile__heading">Phone Number</div>
                                    <div class="dashboard-profile__content">
                                        <p>{{ $account_details->phone }}</p>
                                    </div>
                                </div>
                                <div class="dashboard-profile__item">
                                    <div class="dashboard-profile__heading">Designation</div>
                                    <div class="dashboard-profile__content">
                                        <p>{{ $account_details->designation }}</p>
                                    </div>
                                </div>
                                <!-- <div class="dashboard-profile__item">
                                                                                                                                            <div class="dashboard-profile__heading">Bio</div>
                                                                                                                                            <div class="dashboard-profile__content">
                                                                                                                                                <p>𝗗𝗲𝗮𝗿 𝗘𝗻𝘁𝗿𝗲𝗽𝗿𝗲𝗻𝗲𝘂𝗿𝘀, 𝗶𝗳 𝘆𝗼𝘂 𝗸𝗻𝗼𝘄 𝘄𝗵𝗮𝘁 𝗶𝘀 𝗴𝗼𝗼𝗱 𝗳𝗼𝗿 𝘆𝗼𝘂, 𝗺𝗶𝗻𝗱 𝘁𝗵𝗲 𝗯𝘂𝘀𝗶𝗻𝗲𝘀𝘀 𝘁𝗵𝗮𝘁 𝗽𝗮𝘆𝘀 𝘆𝗼𝘂.</p>
                                                                                                                                            </div>
                                                                                                                                        </div> -->

                            </div>
                            <!-- Dashboard Profile End -->

                        </div>
                    </div>

                    <div class="dashboard-settings__btn">
                        <button class="btn btn-primary btn-hover-secondary">Update Profile</button>
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
