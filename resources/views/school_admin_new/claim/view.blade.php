@extends('layouts.schooladmin.app')

@section('title', 'School Dashboard')

@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')

    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">School Claim Form</h4>
            <div class="dashboard-courses__item">
                <style>
                    p {
                        margin-top: 0;
                        margin-bottom: 00;
                    }

                    .form-group {
                        margin-bottom: 12px;
                    }
                </style>
                <div class="dashboard-courses__thumbnail">
                    <a href="#"><img src="{{ $school->school_logo }}" alt="Courses" width="260"
                            height="174"></a>
                </div>
                <div class="dashboard-courses__content">
                    <h3 class="dashboard-courses__title"><a href="#">{{ $school->name }}</a></h3>
                    <p>{{ $school->school_address[0]->address }}</p>
                    <div class="dashboard-courses__rating">
                        <div class="rating-star">
                            <div class="rating-label" style="width: 80%;"></div>
                        </div>
                        <span>(12)</span>
                    </div>
                </div>
            </div>
            <div class="card m-b-10 mt-5">
                <div class="card-body">
                    <form action="{{ route('schooladmin.claim.new.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="hidden" name="school_id" id="school_id" value="{{ $school->id }}">
                                <label for="inputAddress">Claimant Name</label>
                                <input type="text" class="form-control" name="name" id="inputAddress"
                                    placeholder="Enter Your neme" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Designation</label>
                                <input type="text" class="form-control" name="designation"
                                    placeholder="Enter Your designation" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Official Phone no(will be verified)</label>
                                <input type="text" class="form-control" name="phone" id="inputAddress"
                                    placeholder="Summit School" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Official Email address(will be verified)</label>
                                <input type="text" class="form-control" name="email" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label for="inputAddress">Upload scan copy of School official PAD with official Stamp on
                                    it</label>
                                <input type="file" class="form-control" name="file" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <button type="submit" name="action" value="next" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="small text-center text-black-50 pt-5">Copyright © <?php echo date('Y'); ?> School Dekho. All rights
                reserved.</div>
        </div>
    </div>
@endsection
{{-- </div> --}}
<!-- Dashboard Content End -->

@push('js')
@endpush
