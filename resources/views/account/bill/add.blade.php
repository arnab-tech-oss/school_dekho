@extends('layouts.account.app')
@section('title', 'Admin Dashboard')
@push('css')
@endpush
@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Bill Add</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('account.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('account.list') }}">Bill</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('account.add') }}" class="btn btn-primary">Add Bill</a>
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
                <form action="{{ route('account.submit') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">School Name</label>
                            <select class="form-control example" name="school_id">
                                <option value=""> --Select School-- </option>
                                @foreach ($all_schools as $school)
                                    @if (isset($school->school_address[0]?->address))
                                        <option value="{{ $school->id }}">
                                            {{ $school->name }}&nbsp;{{ $school->school_address[0]?->address }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select name="bill_type" id="bill_type" class="form-control" onchange="Billtype()">
                                <option value="">--Select Bill Type--</option>
                                <option value="Proforma">Proforma</option>
                                <option value="Original">Original</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select name="bill_session_id"  class="form-control" onchange="Billtype()" required>
                                <option value="">--Select Session--</option>
                                @foreach ($all_bill_sessions as $bill_session)
                                    <option value="{{ $bill_session->id }}">
                                        {{ $bill_session->session }}
                                    </option>
                                @endforeach
                              
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="location" placeholder="Enter location">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="gst_number_school"
                                placeholder="Enter School GST number">
                        </div>
                    </div>
                    <div class="form-row" style="display:none" id="proforma">
                        <div class="form-group col-md-6">
                            <input type="text" name="proforma_total_amount" placeholder="Enter total amount to be paid"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-row" id="original">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="received_fees"
                                placeholder="Enter received amount">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="total_fee"
                                placeholder="Enter total fees amount">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="receipt_date">Receipt Date</label>
                            <input type="date" class="form-control" name="receipt_date">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="phone" placeholder="Enter phone">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select name="payment_mode" id="pay_mode" class="form-control" onchange="Paymode()">
                                <option value="">-- Select Payment Mode --</option>
                                <option value="Online">Online</option>
                                <option value="Offline">Offline</option>
                                <option value="Cash">Cash</option>
                                <option value="cheque">Cheque</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row" style="display:none" id="online">
                        <div class="form-group col-md-6">
                            <input type="text" placeholder="Enter transaction Id" name="transaction_id"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-row" style="display:none" id="cheque">
                        <div class="form-group col-md-6">
                            <input type="text" placeholder="Enter bank name" name="bank_name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" placeholder="Enter cheque number" name="check_number"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="submit" name="action" class="btn btn-primary">Add New Bill</button>
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
        $(document).ready(function() {
            $('.example').select2();
        });
    </script>
@endpush
