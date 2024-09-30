@extends('layouts.whatsapp.app')
@section('title', 'School Dashboard')
@push('css')
@endpush
@section('content')
    <style>
        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1px;
            padding: 5%;
        }
    </style>
    <!-- Start Contentbar -->
    <div class="contentbar">
        <div class="row" style="margin-top: 10px">
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('whatsapp.list_message') }}"><i
                                            class="feather icon-book"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">Total Message Sent</h5>
                                <h4 class="mb-0">{{ $total_message_sent }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <span class="font-13"></span>
                            </div>
                            <div class="col-4 text-right">
                                <span class="badge badge-warning"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contentbar -->
@endsection
@push('js')
@endpush
