@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
    @section('content')
    <div class="dashboard-content">
        <div class="dashboard-content">
            <div class="container">
                <h4 class="dashboard-title">Notification</h4>
                <!-- Dashboard Announcement Start -->
                <div class="dashboard-announcement">
                    <!-- Dashboard Announcement Box Start -->
                    <div class="dashboard-content-box">
                        <!-- Dashboard Announcement Add Start -->
                        <div class="dashboard-announcement-add">
                            <div class="dashboard-announcement-add__content-wrap">
                                <!-- <div class="dashboard-announcement-add__icon">
                                                                12
                                                            </div> -->
                                <div class="dashboard-announcement-add__content">
                                    <small> Notification</small>
                                    <p><strong>This feature will be available shortly. Stay tuned.</strong></p>
                                </div>
                            </div>
                            <!-- <div class="dashboard-announcement-add__btn">
                                                            <button class="btn btn-hover-primary btn-primary">Export Now</button>
                                                        </div> -->
                        </div>
                        <!-- Dashboard Announcement Add End -->
                    </div>
                    <!-- Dashboard Announcement Box End -->
                </div>
                <!-- Dashboard Announcement End -->
            </div>
        </div>
        <!-- Dashboard Purchase History End -->
    </div>
</div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->
@push('js')
@endpush