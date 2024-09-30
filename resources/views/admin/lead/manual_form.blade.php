@extends('layouts.admin.app')

@section('title','Leadboard')

@push('css')

@endpush

@section('content')

<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Lead manage</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Add Lead Manualy</li>
                </ol>
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
                <h5 class="card-title">Add manual leads</h5>
            </div>

            @livewire('lead-school')
        </div>
{{-- </div> --}}
    </div>

<!-- End Container -->

@endsection

@push('js')

<script>
    "use strict";
    $(document).ready(function() {
        $('.chat-user-list ul').slimscroll({
            height: '565',
            position: 'right',
            size: "7px",
            color: '#CFD8DC'
        });
        $('.chat-body').slimscroll({
            height: '510',
            position: 'right',
            size: "7px",
            color: '#CFD8DC'
        });
    });
</script>
@endpush
