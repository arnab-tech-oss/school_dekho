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
                    <li><a href="{{ route('schooladmin.prioritysupport') }}">Ticket Generation</a></li>
                    <li><a class="active" href="{{ route('schooladmin.ticket_history') }}">Ticket History</a></li>
                </ul>
            </div>
            <!-- Dashboard Settings Start -->
            <div class="dashboard-settings">
                <div class="row gy-6">
                    <div class="col-lg-12">
                        <!-- Dashboard Settings Info Start -->
                        <div class="dashboard-content-box">
                            <h4 class="dashboard-content-box__title">Ticket History</h4>
                            <div class="dashboard-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Issue</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th class="action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $ticket)
                                            <tr>
                                                <td>
                                                    <div class="dashboard-table__mobile-heading">Subject</div>
                                                    <div class="dashboard-table__price">
                                                        <span class="sale-price">{{ $ticket->issue }}
                                                            <!-- <small class="separator"></small> -->
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dashboard-table__mobile-heading">Status</div>
                                                    @if ($ticket->status == 1)
                                                        <div class="dashboard-table__withdraw-status approved">Solved
                                                        </div>
                                                    @else
                                                        <div class="dashboard-table__result review">Under Process</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dashboard-table__mobile-heading">Requested On</div>
                                                    <div class="dashboard-table__text">
                                                        {{ $ticket->created_at->format('d-M-Y') }}
                                                    </div>
                                                </td>
                                                <td class="action">
                                                    <a class="dashboard-table__link"
                                                        href="{{ route('schooladmin.ticket.details', $ticket->id) }}">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Dashboard Settings Info End -->
                    </div>
                </div>
            </div>
            <!-- Dashboard Settings End -->
        </div>
    </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->
@push('js')
@endpush
