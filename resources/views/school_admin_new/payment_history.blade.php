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
                    <li><a href="{{ route('schooladmin.subscription') }}">Subscriptions</a></li>
                    <li><a class="active" href="{{ route('schooladmin.payment_history') }}">Payment History</a></li>
                    <li><a href="{{ route('schooladmin.subscription_benefit') }}">Subscription Benefits</a></li>
                </ul>
            </div>
            <!-- Dashboard Tabs End -->
            <!-- Dashboard Purchase History Start -->
            <div class="dashboard-purchase-history">
                <div class="dashboard-table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="id">ID</th>
                                <th class="courses">Purchase Item</th>
                                <th class="amount">Amount</th>
                                <th class="status">Date</th>
                                <th class="date"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($school_bills as $bill)
                                @if (sizeof($bill) > 0)
                                    @foreach ($bill as $bill)
                                        <tr>
                                            <td>
                                                <div class="dashboard-table__mobile-heading">ID</div>
                                                <div class="dashboard-table__text">#3</div>
                                            </td>
                                            <td class="course-info">
                                                <div class="dashboard-table__mobile-heading">Purchase Item</div>
                                                <div class="dashboard-table__text">
                                                    <p>{{ $bill->school->name }} (1 Year Premium Subscription)</p>
                                                </div>
                                            </td>
                                            <td class="correct">
                                                <div class="dashboard-table__mobile-heading">Amount</div>
                                                <div class="dashboard-table__text">
                                                    <span class="sale-price">Rs. {{ $bill->newly_received }}<small
                                                            class="separator"></small></span>
                                                </div>
                                            </td>
                                            <td class="earned">
                                                <div class="dashboard-table__mobile-heading">Date</div>
                                                <div class="dashboard-table__text">
                                                    {{ App\Core\Helper::GetDate($bill->created_at) }}</div>
                                            </td>
                                            <td class="action">
                                                <a class="dashboard-table__link"
                                                    href="{{ route('schooladmin.payment_receipt', [$bill->id]) }}"
                                                    target="_blank">Download
                                                    Receipt</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>
                    </table>
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
