@extends('layouts.schooladmin.app')

@section('title', 'School Dashboard')

@push('css')
@endpush
{{-- <div class="dashboard-content"> --}}
@section('content')
    <div class="dashboard-content">

        <div class="container">
            <h4 class="dashboard-title">Leads Details</h4>

            <!-- Dashboard Announcement Start -->
            <div class="dashboard-announcement">

                <!-- Dashboard Announcement Box Start -->
                <div class="dashboard-content-box">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="row gy-4">

                        <div class="modal-body">
                            <form action="{{ route('schooladmin.lead.remarks.submit') }}" method="post">
                            <div class="border-bottom"
                                style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-top: 12px; gap: 6px ; ">

                                    {{ csrf_field() }}
                                    <input type="hidden" name="lead_id" id=""  value="{{ $lead->id }}">
                                    <input type="hidden" name="school_id" id="" value="{{ $school_id }}">
                                    <div class="form-group" style="width: 39%">
                                        <label class="form-label">Status</label>
                                        <select id="lead_status" class="form-select" name="status" required>
                                            {{-- <option value="9">All</option> --}}
                                            <option value="0">New Leads</option>
                                            <option value="1">Interested</option>
                                            <option value="2">Not Interested</option>
                                            <option value="3">No Response</option>
                                            <option value="4">Admitted</option>
                                            <option value="10">Admitted To Other School</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="width: 39%">
                                        <label class="form-label">Remarks</label>
                                        <textarea style="height:70px; min-height: 70px; margin-bottom: 12px;" id="lead_remarks" class="form-control"
                                            name="remarks" s cols="30" rows="1" placeholder="Enter Remarks" required></textarea>
                                    </div>
                                    <div class="form-group" style="margin: auto 0px;">
                                        <label class="form-label"></label>
                                        <input class="btn btn-primary" type="submit" value="Submit"
                                            style="width: 100%; margin-top: 8px" onclick="SubmitRemarks()" />
                                    </div>

                            </div> </form>
                            <div class="card-body">
                                <!--<div class="row">-->
                                <!--    <div class="form-group col-md-3">-->
                                <!--        <label>Admission : </label>-->
                                <!--    </div>-->
                                <!--    <div class="form-group col-md-9">-->
                                <!--                 @if ($lead->admission == '1')-->
                                <!--                      <h5 class="text-success">Admission Done</h5>-->
                                <!--                    @elseif($lead->admission == '10')-->
                                <!--                      <h5 class="text-warning">Admitted To Other School</h5>-->
                                <!--                    @else-->
                                <!--                      <h5 class="text-danger">Admission Pending</h5>-->
                                <!--                @endif-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Lead Status : </label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        @if ($lead_school->status == 0)
                                            <h5 class="dashboard-table__text dashboard-table__result new_lead">
                                                New Lead</h5>
                                        @elseif ($lead_school->status == 1)
                                            <h5 class="dashboard-table__text dashboard-table__result pass">
                                                Interested</h5>
                                        @elseif ($lead_school->status == 2)
                                            <h5 class="dashboard-table__text dashboard-table__result fail">
                                                Not Interested
                                            @elseif ($lead_school->status == 3)
                                                <h5 class="dashboard-table__text dashboard-table__result review">
                                                    No Response</h5>
                                            @elseif ($lead_school->status == 4)
                                                <h5 class="dashboard-table__text dashboard-table__result pass">
                                                    Admitted</h5>
                                            @elseif ($lead_school->status == 10)
                                                <h5 class="dashboard-table__text dashboard-table__result review">
                                                  Admitted To Other School</h5>
                                        @endif
                                    </div>
                                </div>
                                @if ($lead->lead_mode == 'manual')
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Student's Name : </label>
                                        </div>
                                        <div class="form-group col-md-9">
                                            <p><strong>{{ strtoupper($lead->student_name) }}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Parent's Name : </label>
                                        </div>
                                        <div class="form-group col-md-9">
                                            <p><strong>{{ strtoupper($lead->parent_name) }}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Primary Contact : </label>
                                        </div>
                                        <div class="form-group col-md-9">
                                            <p><strong>{{ $lead->student_contact1 }}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Secondary Contact : </label>
                                        </div>
                                        <div class="form-group col-md-9">
                                            <p><strong>{{ $lead->student_contact2 }} </strong></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Admission Seeking for Class : </label> 
                                        </div>
                                        @if ($lead->admission_for == 1) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Pre Nursery</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 2) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Nursery</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 3) 
                                            <div class="form-group col-md-9">
                                                <p><strong>LKG</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 4) 
                                            <div class="form-group col-md-9">
                                                <p><strong>UKG</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 5) 
                                            <div class="form-group col-md-9">
                                                <p><strong>KG</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 6) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Class 1</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 7) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Class 2</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 8) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Class 3</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 9) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Class 4</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 10) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Class 5</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 11) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Class 6</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 12) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Class 7</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 13) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Class 8</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 14) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Class 9</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 15) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Class 10</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 16) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Class 11</strong></p>
                                            </div>
                                         @elseif ($lead->admission_for == 17) 
                                            <div class="form-group col-md-9">
                                                <p><strong>Class 12</strong></p>
                                            </div>
                                        @else
                                        <div class="form-group col-md-9">
                                            <p><strong>{{ strtoupper($lead->admission_for) }}</strong></p>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Remarks : </label>
                                        </div>
                                        <div class="form-group col-md-9">
                                            <p>
                                                <strong>{{ $lead->remarks }}</strong>
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    @foreach ($lead->application as $section)
                                        <div style="border:1px solid grey;margin:10px;padding:10px">
                                            <h5> {{ $section->section }} </h5>
                                            @foreach ($section->elements as $element)
                                                <div class="form-row">
                                                    <div class="col-md-4 form-group">{{ $element->label }}</div>

                                                    <div class="col-md-8 form-group"><strong>
                                                            @if (
                                                                $element->type == 'text' ||
                                                                    $element->type == 'date' ||
                                                                    $element->type == 'email' ||
                                                                    $element->type == 'textarea' ||
                                                                    $element->type == 'select' ||
                                                                    $element->type == 'radio' ||
                                                                    $element->type == 'number')
                                                                {{ $element->value }}
                                                            @endif

                                                            @if ($element->type == 'file')
                                                                <img src="{{ App\Core\FileHelper::GetFileUrl($element->value, App\Core\FileHelper::$application_image_path) }}"
                                                                    width="120" height="120" />
                                                            @endif

                                                            @if ($element->type == 'checkbox')
                                                                @foreach ($element->value as $value)
                                                                    {{ $value }}
                                                                @endforeach
                                                            @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Dashboard Announcement End -->

        </div>

    </div>
      <div class="dashboard-content" style="padding-inline: 15px">
    <div class="dashboard-question-answer">
      <div class="dashboard-table table-responsive">
        <table id="school-table" class="table">
          <thead>
            <tr>
              <th class="question">ID #</th>
              <th class="student">Remarks</th>
              <th class="student">Date of Calling</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($lead_remarks_list as $remarks)
              <tr>
                <td>
                  <div class="dashboard-table__mobile-heading">Sl. No.</div>
                  <div class="dashboard-table__text">
                    {{ $loop->iteration }}
                  </div>
                </td>
                <td>
                  <div class="dashboard-table__questioner-info">
                    <div class="questioner-info">
                      <h5 class="questioner-name">
                      </h5>
                      <span class="question-post-date small">
                        {{ $remarks->remarks }}
                      </span>
                      </span>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="dashboard-table__questioner-info">
                    <div class="questioner-info">
                      <h5 class="questioner-name">
                      </h5>
                      <span class="question-post-date small">
                        {{ $remarks->created_at->format('d F Y') }}
                      </span>
                      </span>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
    <div class="small text-center text-black-50 pt-5">Copyright © <?php echo date('Y'); ?> School Dekho. All rights reserved.
    </div>
@endsection
@push('js')
<script>
    function SubmitRemarks() {
        let lead_status = document.getElementById('lead_status').value;
        let lead_remarks = document.getElementById('lead_remarks').value;

        if (lead_status && lead_remarks) {
            alert("Remarks submitted successfully");
        }
    }
</script>
@endpush
