@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
    <style>
        .nav-tab {
            overflow-x: auto;
            display: flex;
            flex-wrap: nowrap !important;
        }

        .nav-tab li a {
            display: flex !important;
            flex-wrap: nowrap;
            white-space: nowrap;
        }
    </style>
    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">Renewals & Billings</h4>
            <!-- Dashboard Tabs Start -->
            <div class="dashboard-tabs-menu">
                <ul class="nav-tab">
                    <li><a class="active" href="{{ route('schooladmin.subscription') }}">Subscriptions</a></li>
                    <li><a href="{{ route('schooladmin.payment_history') }}">Payment History</a></li>
                    <li><a href="{{ route('schooladmin.subscription_benefit') }}">Subscription Benefits</a></li>
                </ul>
            </div>
            <!-- Dashboard Tabs End -->
            <!-- Dashboard My Quiz Attempts Start -->
            <div class="dashboard-my-quiz-attempts">
                <div class="dashboard-table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="course-info">School Name</th>
                                <th class="action"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schoollist as $school)
                                <tr>
                                    <td class="course-info">
                                        <h3 class="dashboard-table__title"><a href="#">{{ $school->school->name }}</a>
                                        </h3>
                                        <div class="dashboard-table__meta">
                                            <div class="dashboard-table__meta-item">
                                                {{ $school->school->address->address }} -
                                                {{ $school->school->address->pincode }}
                                            </div>
                                            <div class="dashboard-table__meta-item">
                                                <span class="label">Subscription: </span>
                                                <span class="value">Premium</span>
                                            </div>
                                            <div class="dashboard-table__meta-item">
                                                <span class="label">Valid Upto: </span>
                                                <span class="value">
                                                    {{ App\Core\Helper::GetDate($school->expiry_date) }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="result">
                                        <!-- <div class="dashboard-table__mobile-heading">Result</div> -->
                                        @if ($school->verify == '9' && $school->expiry_date < date('Y-m-d'))
                                            <a class="btn btn-primary" href="{{ route('schooladmin.checkout',$school->school->id) }}">Renew Subscription</a>
                                        @endif
                                          
                                    </td>
                                    <!-- <td class="action">
                                                                                                                                    <a class="dashboard-table__link" href="#">Details</a>
                                                                                                                                </td> -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Dashboard My Quiz Attempts End -->
        </div>
    </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->
@push('js')
@endpush
