@extends('layouts.admin.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">School Claim Details</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.school.claimed.list') }}">School Claim</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">


            </div>
        </div>
    </div>
</div>
<div class="contentbar">
    @foreach($school_claims as $claim)
    <br>
    <div class="card m-b-24">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-8">
                    <h4 class="page-title">Claimer {{$loop->iteration}}</h4>
                </div>
                <div class="col-md-4 col-lg-4 ">
                    <div class="widgetbar">
                        @if($claim->verify=='1')
                        <form method="post" action="{{route('admin.claim.verify')}}">
                        {{ csrf_field() }}
                          <input type="hidden" name="school_id" value="{{$claim->school_id}}"/>
                          <input type="hidden" name="claim_id" value="{{$claim->claim_id}}"/>
                          <input type="submit" value="Verify" class="btn btn-primary-rgba"/>
                        </form>
                        @elseif($claim->verify == '9')
                        <a href="#" class="btn btn-success-rgba"><i class="feather icon-check mr-2"></i>Verified</a>
                        @else($claim->verify == '2')
                        <a href="#" class="btn btn-danger-rgba"><i class="feather icon-check mr-2"></i>Rejected</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>


        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><strong>Claimer's Name</strong></label>
                    <p>
                        {{$claim->name}}
                    </p>
                </div>
                <div class="form-froup col-md-6">
                    <label><strong>Designation</strong></label>
                    <p>
                        {{$claim->designation}}
                    </p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><strong>Claimer's Email</strong></label>
                    <p>
                        {{$claim->email}}
                    </p>
                </div>
                <div class="form-froup col-md-6">
                    <label><strong>Phone Number</strong></label>
                    <p>
                        {{$claim->phone}}
                    </p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-9">
                    <label>Relavant document</label>
                    <img src="{{App\Core\FileHelper::GetFileUrl($claim->path)}}" height="200" width="200">
                </div>
            </div>
        </div>


    </div>
    <br>
    @endforeach
</div>

@endsection

@push('js')

@endpush