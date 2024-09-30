@extends('layouts.school.app')

@section('title','Admin Dashboard')

@push('css')

@endpush

@section('content')
        <!-- Start Breadcrumbbar -->
        <div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">School</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">eCommerce</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Facilities</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Container -->
<form action="{{ route('school.facility.update') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="contentbar">
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Educational Facilities</h5>
            </div>
            <input type="hidden" name="id" value="{{$facility->school_id}}">
            <?php
            $education= array("Library","Career Counsiling","Student Exchange","Digital Library","Counseling","Test Center");
            $education1=array_fill(1,6,null);
            $i=1;
            ?>
            <div class="card-body">
                <div class="form-row">
                @if($schoolfeatures=json_decode($facility->education))
                    @foreach($schoolfeatures as $features)
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="education[]" value="{{$features}}" checked>
                        <label for="accessories" style="margin-left: 10px;margin-top: -5px;">{{ $features}}</label>
                        <?php
                        $education1[$i]=$features;
                        $i++;
                        ?>
                    </div>
                    @endforeach
                @endif
                <?php
                $result=array();
                $result=array_diff($education,$education1);
                foreach($result as $key=>$value)
                {
                ?>
                <div class="form-row col-md-4">
                  <input type="checkbox" name="education[]" value="<?php echo $value;?>">
                  <label for="accessories" style="margin-left: 10px;margin-top: -5px;"><?php echo $value;?></label>
                </div>
                <?php
                }
                ?>
            </div>
            </div>

        </div>

     <br>
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Classroom Facilities</h5>
            </div>
            <?php
            $classroom=array("AC Class rooms","AV Class rooms","Lockers");
            $classroom1=array_fill(1,3,null);
            $i=1;
            ?>
            <div class="card-body">
                <div class="form-row">
                @if($schoolfeatures=json_decode($facility->classroom))
                    @foreach($schoolfeatures as $features)
                    <div class="form-row col-md-4">

                        <input type="checkbox" name="classroom[]" value="{{$features}}" checked>
                        <label for="accessories" style="margin-left: 10px;margin-top: -5px;">{{$features}}</label>
                    </div>
                        <?php
                        $classroom1[$i]=$features;
                        $i++;
                        ?>
                    </div>
                    @endforeach
                @endif
                <?php
                    $result=array();
                    $result=array_diff($classroom,$classroom1);
                    foreach($result as $key=>$value)
                    {
                    ?>
                    <div class="form-row col-md-4">
                            <input type="checkbox" name="classroom[]" value="<?php echo $value?>">
                            <label for="accessories" style="margin-left: 10px;margin-top: -5px;"><?php echo $value?></label>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
            </div>



    <br>
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Laboratories Facilities</h5>
            </div>
            <?php
            $lab=array("Laboratories","Computer Labs","Robotics Labs","Maths Labs","Language Lab");
            $lab1=array_fill(1,5,null);
            $i=1;
            ?>
            <div class="card-body">
                <div class="form-row">
                    @if($schoolfeatures=json_decode($facility->lab))
                        @foreach($schoolfeatures as $features)
                        <div class="form-row col-md-4">
                            <input type="checkbox" name="lab[]" value="{{$features}}" checked>
                            <label for="accessories">{{$features}}</label>
                        </div>
                        <?php
                            $lab1[$i]=$features;
                            $i++;
                        ?>
                        @endforeach
                    @endif
                    <?php
                        $result=array();
                        $result=array_diff($lab,$lab1);
                        foreach($result as $key=>$value)
                        {
                        ?>
                        <div class="form-row col-md-4">
                            <input type="checkbox" name="lab[]" value="<?php echo $value;?>">
                            <label for="accessories"><?php echo $value;?></label>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>

        </div>

    <br>

        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Boarding Facilities</h5>
            </div>
            <?php
            $boarding=array("Hostel","AC Hostel");
            $boarding1=array_fill(1,2,null);
            $i=1;
            ?>
            <div class="card-body">
                <div class="form-row">
            @if($schoolfeatures=json_decode($facility->boarding))
                @foreach($schoolfeatures as $features)
                <div class="form-row col-md-4">
                    <input type="checkbox" name="boarding[]" value="{{$features}}" checked>
                    <label for="accessories" style="margin-left: 10px;margin-top: -5px;">{{$features}}</label>
                    <?php
                    $boarding1[$i]=$features;
                    $i++;
                    ?>
                </div>
                @endforeach
            @endif

            <?php
                $result=array();
                $result=array_diff($boarding,$boarding1);
                foreach($result as $key=>$value)
                {
                ?>
            <div class="form-row col-md-4">
                    <input type="checkbox" name="boarding[]" value="<?php echo $value;?>">
                    <label for="accessories" style="margin-left: 10px;margin-top: -5px;"><?php echo $value;?></label>
            </div>
            <?php
                }
            ?>
            </div>
            </div>

        </div>

    <br>
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Sports Facilities</h5>
            </div>
            <?php
            $sports=array("Play Area","Badminton","Cricket","Covered Play Area","Hockey","Football","Volleyball","Tennis","Kabaddi","Swimming","Table Tennis","Athletics","Gymnasium","Karate");
            $sports1=array_fill(1,14,null);
            $i=1;
            ?>
            <div class="card-body">
                <div class="form-row">
                    @if($schoolfeatures=json_decode($facility->sports))
                        @foreach($schoolfeatures as $features)
                            <div class="form-row col-md-4">
                                <input type="checkbox" name="sports[]" value="{{$features}}" checked>
                                <label for="accessories" style="margin-left: 10px;margin-top: -5px;">{{$features}}</label>
                                <?php
                                    $sports1[$i]=$features;
                                    $i++;
                                ?>
                            </div>
                        @endforeach
                    @endif
                <?php
                $result=array();
                $result=array_diff($sports,$sports1);
                foreach($result as $key=>$value)
                {
                ?>
                <div class="form-row col-md-4">
                        <input type="checkbox" name="sports[]" value="<?php echo $value?>">
                        <label for="accessories" style="margin-left: 10px;margin-top: -5px;"><?php echo $value?></label>
                </div>
                <?php
                }
                ?>
                </div>
            </div>
        </div>


    <br>
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Performing Arts Facilities</h5>
            </div>
            <?php
                $arts=array("Art","Dance","Dramatics","Music");
                $arts1=array_fill(1,4,null);
                $i=1;
            ?>
            <div class="card-body">
                <div class="form-row">

                @if($schoolfeatures=json_decode($facility->arts))
                    @foreach($schoolfeatures as $features)
                    <div class="form-row col-md-4">
                        <input type="checkbox" name="arts[]" value="{{$features}}" checked>
                        <label for="accessories" style="margin-left: 10px;margin-top: -5px;">{{$features}}</label>
                    </div>
                    <?php
                        $arts1[$i]=$features;
                        $i++;
                    ?>
                    @endforeach
                @endif
                <?php
                    $result=array();
                    $result=array_diff($arts,$arts1);
                    foreach($result as $key=>$value)
                    {
                ?>
                <div class="form-row col-md-4">
                        <input type="checkbox" name="arts[]" value="<?php echo $value?>">
                        <label for="accessories" style="margin-left: 10px;margin-top: -5px;"><?php echo $value?></label>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
    <br>

        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Digital Facilities</h5>
            </div>
            <?php
                $digital=array("AV Facilities","Interactive Boards","School App","Wi-fi");
                $digital1=array(1,4,null);
                $i=1;
            ?>
            <div class="card-body">
                <div class="form-row">
            @if($schoolfeatures=json_decode($facility->digital))
                @foreach($schoolfeatures as $features)
                <div class="form-row col-md-4">
                    <input type="checkbox" name="digital[]" value="{{$features}}" checked>
                    <label for="accessories" style="margin-left: 10px;margin-top: -5px;">{{$features}}</label>
                </div>
                <?php
                       $digital1[$i]=$features;
                       $i++;
                ?>
                @endforeach
            @endif
            <?php
                $result=array();
                $result=array_diff($digital,$digital1);
                foreach($result as $key=>$value)
                {
            ?>
            <div class="form-row col-md-4">
                    <input type="checkbox" name="digital[]" value="<?php echo $value?>">
                    <label for="accessories" style="margin-left: 10px;margin-top: -5px;"><?php echo $value?></label>
            </div>
            <?php
                }
            ?>
            </div>
            </div>
        </div>
    <br>
        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Food and Catering Facilities</h5>
            </div>
            <?php
                $food=array("Canteen","Meal Served","School App","Kitchen & Dining Hall");
                $food1=array(1,4,null);
                $i=1;
            ?>
            <div class="card-body">
                <div class="form-row">
            @if($schoolfeatures=json_decode($facility->food))
                @foreach($schoolfeatures as $features)
                <div class="form-row col-md-4">
                    <input type="checkbox" name="food[]" value="{{$features}}" checked>
                    <label for="accessories" style="margin-left: 10px;margin-top: -5px;">{{$features}}</label>
                </div>
                <?php
                     $food1[$i]=$features;
                     $i++;
                ?>
                @endforeach
            @endif
            <?php
                $result=array();
                $result=array_diff($food,$food1);
                foreach($result as $key=>$value)
                {
                ?>
                <div class="form-row col-md-4">
                    <input type="checkbox" name="food[]" value="<?php echo $value?>">
                    <label for="accessories" style="margin-left: 10px;margin-top: -5px;"><?php echo $value?></label>
                </div>
            <?php }?>
            </div>

        </div>

    </div>

   <br>
    <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Safety & Security Facilities</h5>
            </div>
            <?php
                $safety=array("CCTV","Fire Alarm","Fire Extinguisher","Security Guards","Boundary Wall","Fenced Boundary Wall","Speedometer in Bus","GPS in Bus","CCTV in Bus","Fire Extinguisher in Bus","School Bus Tracking App");
                $safety1=array(1,11,null);
                $i=1;
            ?>
            <div class="card-body">
                <div class="form-row">
                    @if($schoolfeatures=json_decode($facility->security))
                        @foreach($schoolfeatures as $features)
                            <div class="form-row col-md-4">
                                <input type="checkbox" name="security[]" value="{{$features}}" checked>
                                <label for="accessories" style="margin-left: 10px;margin-top: -5px;">{{$features}}</label>
                            </div>
                            <?php
                                $safety1[$i]=$features;
                                $i++;
                            ?>
                        @endforeach
                    @endif
                    <?php
                        $result=array();
                        $result=array_diff($safety,$safety1);
                        foreach($result as $key=>$value){?>
                            <div class="form-row col-md-4">
                                    <input type="checkbox" name="security[]" value="<?php echo $value?>">
                                    <label for="accessories" style="margin-left: 10px;margin-top: -5px;"><?php echo $value?></label>
                            </div>
                        <?php }
                    ?>
                </div>
            </div>
        </div>
    <br>

        <div class="card m-b-24">
            <div class="card-header">
                <h5 class="card-title">Medical Facilities</h5>
            </div>
            <?php
            $medical=array("Medical Facility","Medical Room or Clinic","ICU","Medical Staff","Isolation Room","Dedicated Ambulance","Resident Doctor");
            $medical1=array(1,7,null);
            $i=1;
            ?>
            <div class="card-body">
                <div class="form-row">
            @if($schoolfeatures=json_decode($facility->medical))
                  @foreach($schoolfeatures as $features)
                  <div class="form-row col-md-4">
                    <input type="checkbox" name="medical[]" value="{{$features}}" checked>
                    <label for="accessories" style="margin-left: 10px;margin-top: -5px;">{{$features}}</label>
                </div>
                <?php
                    $medical1[$i]=$features;
                    $i++;
                ?>
                  @endforeach
            @endif
            <?php
                $result=array();
                $result=array_diff($medical,$medical1);
                foreach($result as $key=>$value)
                {
            ?>
            <div class="form-row col-md-4">
                    <input type="checkbox" name="medical[]" value="<?php echo $value?>">
                    <label for="accessories" style="margin-left: 10px;margin-top: -5px;"><?php echo $value?></label>
            </div>
            <?php }?>
            </div>
        </div>
    </div>
    <br>


        <div class="card m-b-26">
            <div class="card-header">
                <h5 class="card-title">Other Infra Facilities</h5>
            </div>
            <?php
            $other=array("Kids Play Area","Activity Center","Toy Room","Amphitheatre","Auditorium","Day Care");
            $other1=array(1,6,null);
            $i=1;
            ?>
            <div class="card-body">
                <div class="form-row">
            @if($schoolfeatures=json_decode($facility->infra))
                  @foreach($schoolfeatures as $features)
                  <div class="form-row col-md-4">
                    <input type="checkbox" name="infra[]" value="{{$features}}" checked>
                    <label for="accessories" style="margin-left: 10px;margin-top: -5px;">{{$features}}</label>
                </div>
                <?php
                    $other1[$i]=$features;
                    $i++;
                ?>
                @endforeach
            @endif
            <?php
                $result=array();
                $result=array_diff($other,$other1);
                foreach($result as $key=>$value)
                {
            ?>
            <div class="form-row col-md-4">
                    <input type="checkbox" name="infra[]" value="<?php echo $value?>">
                    <label for="accessories" style="margin-left: 10px;margin-top: -5px;"><?php echo $value?></label>
            </div>
            <?php
                }
            ?>
            </div>
        </div>
    </div>
<br>
<div class="row">

                    <div class="col-md-12 text-center">
                        <button type="submit" name="action" value="previous" class="btn btn-primary">Update</button>
                    </div>

</div>
</div>
<br>

</form>

<!-- End Container -->


@endsection

@push('js')

@endpush
