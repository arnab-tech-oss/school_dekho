@extends('layouts.account.app')
@section('title', 'Admin Dashboard')
@push('css')
@endpush
@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Bill Edit</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('account.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('account.list') }}">Bill</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Original Bill Edit</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('account.add') }}" class="btn btn-primary">Original Bill Edit</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Container -->
    <div class="contentbar">
        {{-- <div class="col-md-6"> --}}
        <div class="card m-b-10">
            <div class="card-header">
                <h5 class="card-title">Add New Bill</h5>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success col-md-12">
                    {{ Session::get('message') }}
                    @php
                        Session::forget('message');
                    @endphp
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('account.original.update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $bill_details?->id }}">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">School Name</label>
                        <select class="form-control example" name="school_id">
                            <option value=""> --Select School-- </option>
                            @foreach ($all_schools as $school)
                                @if (isset($school->school_address[0]?->address))
                                    <option value="{{ $school->id }}" @if ($bill_details->school_id == $school->id) selected @endif>
                                        {{ $school->name }}&nbsp;{{ $school->school_address[0]?->address }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-row">
                        <div class="form-group col-md-6">
                            <select name="bill_type" id="bill_type" class="form-control" onchange="Billtype()">
                                <option value="">--Select Bill Type--</option>
                                <option value="Proforma"@if ($bill_details?->bill_type == 'Proforma') @selected(true) @endif>Proforma
                                </option>
                                <option value="Original"@if ($bill_details?->bill_type == 'Original') @selected(true) @endif>Original
                                </option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="location" placeholder="Enter location"
                                value="{{ $bill_details?->location }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Enter email"
                                value="{{ $bill_details?->email_id }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="gst_number_school"
                                placeholder="Enter School GST Number" value="{{ $bill_details?->gst_number_school }}">
                        </div>
                    </div>
                    <div class="form-row" style="display:none" id="proforma">
                        <div class="form-group col-md-6">
                            <input type="text" name="proforma_total_amount" placeholder="Enter total amount to be paid"
                                class="form-control" value="{{ $bill_details?->total }}">
                        </div>
                    </div>
                    @if (isset($bill_details?->newly_received))
                        <div class="form-row" id="original">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="received_fees"
                                    placeholder="Enter received amount" value="{{ $bill_details?->newly_received }}">
                            </div>
                        </div>
                    @else
                        <div class="form-row" id="original">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="received_fees"
                                    placeholder="Enter received amount" value="{{ $bill_details?->total }}">
                            </div>
                        </div>
                    @endif
                    <div class="form-group col-md-6" id="total_fees">
                        <input type="text" class="form-control" name="total_fee" placeholder="Enter total fees amount"
                            value="{{ $bill_details?->total_fees_amount }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="receipt_date">Receipt Date</label>
                        <input type="date" class="form-control" name="receipt_date"
                            value="{{ App\Core\Helper::GetDate($bill_details?->receipt_date, 'Y-m-d') }}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="phone" placeholder="Enter phone"
                                value="{{ $bill_details?->mobile }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select name="payment_mode" id="pay_mode" class="form-control" onchange="Paymode()">
                                <option value="">-- Select Payment Mode --</option>
                                <option value="Online" @if ($bill_details?->payment_mode == 'Online') selected @endif>
                                    Online</option>
                                <option value="Offline">Offline</option>
                                <option value="Cash">Cash</option>
                                <option value="cheque" @if ($bill_details?->payment_mode == 'cheque') selected @endif>Cheque
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row" style="display:none" id="online">
                        <div class="form-group col-md-6">
                            <input type="text" placeholder="Enter transaction Id" name="transaction_id"
                                class="form-control" value="{{ $bill_details?->transaction_id }}">
                        </div>
                    </div>
                    <div class="form-row" style="display:none" id="cheque">
                        <div class="form-group col-md-6">
                            <input type="text" placeholder="Enter bank name" name="bank_name" class="form-control"
                                value="{{ $bill_details?->bank_name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" placeholder="Enter check number" name="check_number"
                                class="form-control" value="{{ $bill_details?->cheque_number }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="submit" name="action" class="btn btn-primary">Update Bill</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- </div> --}}
    </div>
    <!-- End Container -->
@endsection
@push('js')
    {{-- <script></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.example').select2();
        });
        var x = document.getElementById('pay_mode').value;
        if (x == "cheque") {
            document.getElementById('cheque').style.display = 'block';
        }
        if (x == "Online") {
            document.getElementById('online').style.display = 'block';
        }
        var y = document.getElementById('bill_type').value;
        if (y == 'Proforma') {
            document.getElementById('proforma').style.display = 'block';
            document.getElementById('original').style.display = 'none';
            document.getElementById('total_fees').style.display = 'none';
        }

        function Billtype() {
            var billtype = document.getElementById('bill_type').value;
            if (billtype == "Proforma") {
                document.getElementById('proforma').style.display = 'block';
                document.getElementById('original').style.display = 'none';
            } else {
                document.getElementById('proforma').style.display = 'none';
                document.getElementById('original').style.display = 'block';
            }
        }

        function Paymode() {
            var paymode = document.getElementById('pay_mode').value;
            if (paymode == "cheque") {
                document.getElementById('cheque').style.display = 'block';
            } else {
                document.getElementById('cheque').style.display = 'none';
            }
            if (paymode == "Online") {
                document.getElementById('online').style.display = 'block';
            } else {
                document.getElementById('online').style.display = 'none';
            }
        }
    </script>
@endpush
