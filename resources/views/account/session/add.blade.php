@extends('layouts.account.app')
@section('title', 'Admin Dashboard')
@push('css')
@endpush
@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Bill Session Add</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('account.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('account.list') }}">Session</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('account.add') }}" class="btn btn-primary">Add Bill </a>
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
                <form action="{{ route('account.session.submit') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Session</label>
                            <input type="text" class="form-control" name="session" placeholder="Enter session">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-4">
                            <button type="submit" name="action" class="btn btn-primary">Add New Session</button>
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
