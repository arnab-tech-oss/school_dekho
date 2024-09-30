@extends('layouts.account.app')

@section('title', 'Account Dashboard')

@push('css')
@endpush

@section('content')

    <!-- Start Contentbar -->
    <div class="contentbar">
        <div class="row" style="margin:35px">

            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('account.list') }}"><i class="feather icon-book"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">Original Bills</h5>
                                <h4 class="mb-0">{{ $total_original_bills }}</h4>
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

            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="action-icon badge badge-success-inverse mr-0"><a
                                        href="{{ route('account.proforma.list') }}"><i
                                            class="feather icon-book"></i></a></span>
                            </div>
                            <div class="col-7 text-right">
                                <h5 class="card-title font-14">Proforma Bills</h5>
                                <h4 class="mb-0">{{ $total_proforma_bills }}</h4>
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
