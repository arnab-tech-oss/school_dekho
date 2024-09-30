@extends('layouts.schooladmin.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">Add Details: </h4>
            <!-- Dashboard Settings Start -->
            <div class="dashboard-settings">
                <!-- Dashboard Tabs Start -->
                <div class="dashboard-tabs-menu">
                    <ul>
                        <li><a href="{{ route('schooladmin.add') }}">About</a></li>
                        <li><a href="{{ route('schooladmin.contact.details') }}">Contacts</a></li>
                        <li><a class="active" href="{{ route('schooladmin.eligibility.details') }}">Eligibility</a>
                        </li>
                        <li><a href="{{ route('schooladmin.fees.details') }}">Fees Structure</a></li>
                        <li><a href="{{ route('schooladmin.timing.details') }}">Opening
                                Hours</a>
                        </li>
                        <li><a href="">Facilities</a>
                        </li>
                        <li><a href="{{ route('schooladmin.gallery.details') }}">Gallery</a></li>
                    </ul>
                </div>
                <!-- Dashboard Tabs End -->
                <div class="row gy-6">
                    @livewire('school-admin.eligibility')
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
