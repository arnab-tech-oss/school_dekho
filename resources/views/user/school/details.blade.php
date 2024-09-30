@extends('layouts.frontend.app')

@push('css')

@endpush

@section('content')

<nav class="mobile-nav">
    <div class="container">
        <div class="mobile-group">
            <a href="index.html" class="mobile-widget">
                <!--i class="fas fa-home"></i--><span>Eligibility</span>
            </a>
            <a href="notification.html" class="mobile-widget">
                <!--i class="fas fa-bell"></i--><span>Fees</span>
                <!--sup>0</sup-->
            </a>
            <a href="user-form.html" class="mobile-widget">
                <!--i class="fas fa-user"></i--><span>Academics</span>
            </a>
            <!--a href="ad-post.html" class="mobile-widget plus-btn">
					<i class="fas fa-plus"></i><span>Ad Post</span>
				</a-->

            <a href="message.html" class="mobile-widget">
                <!--i class="fas fa-envelope"></i--><span>Seats</span>
                <!--sup>0</sup-->
            </a>
            <a href="message.html" class="mobile-widget">
                <!--i class="fas fa-envelope"></i--><span>Review</span>
                <!--sup>0</sup-->
            </a>
        </div>
    </div>
</nav>

<section class="dash-header-part fixed" style="box-shadow: 0 5px 5px -5px #ccc;">
    <div class="container">
        <div class="dash-header-card">
            <div class="row">
                <div class="col-lg-9">
                    <div class="dash-header-left">
                        <div class="dash-avatar">
                            <a href="#"><img src="{{$schooldetails->school_logo}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                        </div>

                        <div class="dash-intro">
                            <h4><a href="#">{{$schooldetails->name}}</a> @if($is_verified)<i class="fas fa-check-circle text-primary" title="Verified by School Dekho"></i>@endif</h4>
                            <!--h4><a href="#">Loreto Day School(Kolkata)</a> <i class="fas fa-question-circle text-muted"></i> <a href ="#" class = "text-secondary" style = "font-size: .8rem; font-style = "italic">Claim this School</a></h4-->
                            <h5><i class="fas fa-map-marker-alt"></i> {{$schooldetails->address?->address}}<br>{{$schooldetails->address?->pincode}}&nbsp;&nbsp;{{$schoolcontacts?->states?->state}}</h5>
                            <h5>
                                <i class="fas fa-school gcolor"></i> <span class="gcolor">{{$schooldetails['categories']->category}}</span> &nbsp; &nbsp;
                                <i class="fas fa-award gcolor"></i> <span class="gcolor">{{$schooldetails['boards']->board_name}}</span> &nbsp; &nbsp;
                                <i class="fas fa-users gcolor"></i> <span class="gcolor">{{$schooldetails->school_type}}</span> &nbsp; &nbsp;
                                <i class="fas fa-book-reader gcolor"></i> <span class="gcolor">{{$schooldetails['medium']->medium}}</span>
                            </h5>
                            <div class="review-meta">
                                <ul>
                                    <?php
                                    $x = 5 - (int)$school_review;
                                    ?>
                                    @for($i=1;$i<=(int)$school_review;$i++) <li><i class="fas fa-star active"></i></li>
                                        @endfor
                                        @for($i=1;$i<=$x;$i++) <li><i class="fas fa-star"></i></li>
                                            @endfor
                                            <li>
                                                <h5>- {{(int)$school_review}}.0/5.0</h5>
                                            </li>
                                            <li class=""> &nbsp; &nbsp;<i class="fas fa-eye text-success"></i> </li>
                                            <li class="">
                                                <h5 class="text-secondary"> {{$schooldetails->view_count}}</h5>
                                            </li>
                                            <li class="">
                                                <h6 class="text-secondary"> Views</h6>
                                            </li>
                                </ul>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <a href="#" class="btn btn-info review-submit" onclick="AddedForCompare()"><span>Add to Compare </span></button>
                        <a href="{{url('/school/application/'.$schooldetails->id)}}" class="btn btn-success review-submit"><span>apply now </span></a>

                </div>
                @if(Session::has('alert'))
                <script>
                    alert("{{Session::get('alert')}}");
                </script>
                @endif

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="dash-header-alert alert ">
                        <a class="small" href="" style="font-weight: 500;">Claim this School & get varified blue tick. Contact us for varification details.<button data-dismiss="alert"><i class="fas fa-times-circle"></i></button></a>

                    </div>
                </div>
            </div>
            <div class="row" style="position:relative;">
                <div class="col-lg-12">
                    <div class="dash-menu-list">
                        <ul>
                            <li><a class="active" href="#about">About</a></li>
                            <li><a class="" href="#eligibility">Eligibility</a></li>
                            <!-- <li><a class="" href="#academics">Academics</a></li> -->
                            <li><a class="" href="#fees">Fees</a></li>
                            <li><a class="" href="#seat">Seat Avalibility</a></li>
                            <li><a class="" href="#facilities">Facilities</a></li>
                            <li><a class="" href="#360">Gallary</a></li>
                            <li><a class="" href="#review">Review</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dashboard-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="account-card alert fade show box-2px">
                    <div class="account-title">
                        <h3>About the School</h3>
                        <!--button data-dismiss="alert">close</button-->
                    </div>
                    <div class="dash-content">
                        <p style="text-align: justify;">
                            {{$schooldetails->about}}
                        </p>
                        <div class="blog-sidebar">
                            <div class="blog-sidebar-title">
                                <h5></h5>
                            </div>
                            <ul class="blog-icon">
                                <li><i>Share Loreto Day School(Kolkata) on</i> </li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="account-card alert fade box-2px show">
                    <div class="account-title">
                        <h3>From the Principal's Desk</h3>
                        <!--button data-dismiss="alert">close</button-->
                    </div>
                    <div class="dash-content" id="eligibility">
                        <div class="review-profile">
                            <a href="#" class="review-avatar"><img src="{{$schooldetails->principal_pic}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                            <div class="review-meta">
                                <h5>{{$schooldetails->principal_name}}</h5>
                                
                            </div>
                        </div>
                        <p style="margin-top: 15px; text-align: justify;">
                            {{$schooldetails->principal_desk}}

                    </div>
                </div>

                <div class="account-card alert fade show box-2px">
                    <div class="account-title" id="academics">
                        <h3>Eligibility Criteria</h3>
                        <!--button data-dismiss="alert">Edit</button-->
                    </div>
                    <ul class="account-card-list">
                        <li>
                            <h5>Pre-Nursery</h5>
                            @if($schooldetails['elligibilities']->pre_nursery)
                            <p>{{$schooldetails['elligibilities']->pre_nursery}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>Class I</h5>
                            @if($schooldetails['elligibilities']->nursery)
                            <p>{{$schooldetails['elligibilities']->nursery}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>LKG</h5>
                            @if($schooldetails['elligibilities']->lkg)
                            <p>{{$schooldetails['elligibilities']->lkg}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>UKG</h5>
                            @if($schooldetails['elligibilities']->ukg)
                            <p>{{$schooldetails['elligibilities']->ukg}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>KG</h5>
                            @if($schooldetails['elligibilities']->kg)
                            <p>{{$schooldetails['elligibilities']->kg}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>Class-I</h5>
                            @if($schooldetails['elligibilities']->class_one)
                            <p>{{$schooldetails['elligibilities']->class_one}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>Class-II</h5>
                            @if($schooldetails['elligibilities']->class_two)
                            <p>{{$schooldetails['elligibilities']->class_two}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>Class-III</h5>
                            @if($schooldetails['elligibilities']->class_three)
                            <p>{{$schooldetails['elligibilities']->class_three}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>Class-IV</h5>
                            @if($schooldetails['elligibilities']->class_four)
                            <p>{{$schooldetails['elligibilities']->class_four}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>Class-V</h5>
                            @if($schooldetails['elligibilities']->class_five)
                            <p>{{$schooldetails['elligibilities']->class_five}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>Class-VI</h5>
                            @if($schooldetails['elligibilities']->class_six)
                            <p>{{$schooldetails['elligibilities']->class_six}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>Class-VII</h5>
                            @if($schooldetails['elligibilities']->class_seven)
                            <p>{{$schooldetails['elligibilities']->class_seven}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>Class-VIII</h5>
                            @if($schooldetails['elligibilities']->class_eight)
                            <p>{{$schooldetails['elligibilities']->class_eight}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>Class-IX</h5>
                            @if($schooldetails['elligibilities']->class_nine)
                            <p>{{$schooldetails['elligibilities']->class_nine}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>Class-X</h5>
                            @if($schooldetails['elligibilities']->class_ten)
                            <p>{{$schooldetails['elligibilities']->class_ten}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>Class-XI</h5>
                            @if($schooldetails['elligibilities']->class_eleven)
                            <p>{{$schooldetails['elligibilities']->class_eleven}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                        <li>
                            <h5>Class-XII</h5>
                            @if($schooldetails['elligibilities']->class_twelve)
                            <p>{{$schooldetails['elligibilities']->class_twelve}}+ Years</p>
                            @else
                            <p>-</p>
                            @endif
                        </li>
                    </ul>
                </div>
                {{--<div class="account-card alert fade show box-2px" id="academics">
                    <div class="account-title">
                        <h3>Academic Performence</h3>
                        <!--button data-dismiss="alert">close</button-->
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dash-review-widget">
                                <h4>ISC -2021 RESULTS </h4>

                            </div>
                            <div>
                                <ul class="account-card-list">
                                    <li>
                                        <h5>No. of students appeared</h5>
                                        <p>254</p>
                                    </li>
                                    <li>
                                        <h5>No. of students Passed</h5>
                                        <p>254</p>
                                    </li>
                                    <li>
                                        <h5>Above 95%</h5>
                                        <p>-</p>
                                    </li>
                                    <li>
                                        <h5>Above 90%</h5>
                                        <p>72</p>
                                    </li>
                                    <li>
                                        <h5>Above 80%</h5>
                                        <p>116</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dash-review-widget padding-top-20">
                                <h4>ICSE -2021 RESULTS </h4>

                            </div>
                            <div id="fees">
                                <ul class="account-card-list">
                                    <li>
                                        <h5>No. of students appeared</h5>
                                        <p>268</p>
                                    </li>
                                    <li>
                                        <h5>No. of students Passed</h5>
                                        <p>268</p>
                                    </li>
                                    <li>
                                        <h5>Above 95%</h5>
                                        <p>-</p>
                                    </li>
                                    <li>
                                        <h5>Above 90%</h5>
                                        <p>103</p>
                                    </li>
                                    <li>
                                        <h5>Above 80%</h5>
                                        <p>92</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>--}}

                <div class="account-card alert fade show box-2px">
                    <div class="account-title">
                        <h3>Fees Structure</h3>
                        <!--button data-dismiss="alert">close</button-->
                    </div>
                    <div class="dash-content" id="seat">
                        <div class="row">
                            <div class="col-lg-12">

                                <div>
                                    <ul class="account-card-list">
                                        <table class="table table-sm">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Class</th>
                                                    <th scope="col">Admission</th>
                                                    <th scope="col">Annual</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Pre-Nursery</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->pre_nursery))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Nursery</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->nursery))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>LKG</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->lkg))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>UKG</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->ukg))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Class-I</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->class_one))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Class-II</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->class_two))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Class-III</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->class_three))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Class-IV</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->class_four))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Class-V</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->class_five))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Class-VI</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->class_six))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Class-VII</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->class_seven))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Class-VIII</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->class_eight))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Class-IX</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->class_nine))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Class-X</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->class_ten))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Class-XI</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->class_eleven))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>Class-XII</td>
                                                    @if($fees=explode(',',$schooldetails['fees']->class_twelve))
                                                    @foreach($fees as $fee)
                                                    <td>{{$fee}}</td>
                                                    @if($loop->iteration==2)
                                                    @break
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </ul>
                                    <p class="small">
                                        *Fees are updates upto sesssion 2020-21. <a href="">Contact us</a> for latest details.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="account-card alert fade show box-2px">
                    <div class="account-title">
                        <h3>Seat Avalibility</h3>
                        <!--button data-dismiss="alert">close</button-->
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="account-card-list">
                                <li>
                                    <h5 class="text-uppercase">Class</h5>
                                    <h5 class="text-uppercase">Available Seats</h5>
                                </li>
                                <li>
                                    <h5>Pre Nursary</h5>
                                    <p>{{$schooldetails['seats']->pre_nursery}}</p>
                                </li>
                                <li>
                                    <h5>Nursary</h5>
                                    <p>{{$schooldetails['seats']->nursery}}</p>
                                </li>
                                <li>
                                    <h5>LKG</h5>
                                    <p>{{$schooldetails['seats']->lkg}}</p>
                                </li>
                                <li>
                                    <h5>UKG</h5>
                                    <p>{{$schooldetails['seats']->ukg}}</p>
                                </li>
                                <li>
                                    <h5>KG</h5>
                                    <p>{{$schooldetails['seats']->kg}}</p>
                                </li>
                                <li>
                                    <h5>Class-I</h5>
                                    <p>{{$schooldetails['seats']->class_one}}</p>
                                </li>
                                <li>
                                    <h5>Class-II</h5>
                                    <p>{{$schooldetails['seats']->class_two}}</p>
                                </li>
                                <li>
                                    <h5>Class-III</h5>
                                    <p>{{$schooldetails['seats']->class_three}}</p>
                                </li>
                                <li>
                                    <h5>Class-IV</h5>
                                    <p>{{$schooldetails['seats']->class_four}}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="account-card-list">
                                <li>
                                    <h5 class="text-uppercase">Class</h5>
                                    <h5 class="text-uppercase">Available Seats</h5>
                                </li>
                                <li>
                                    <h5>Class-V</h5>
                                    <p>{{$schooldetails['seats']->class_five}}</p>
                                </li>
                                <li>
                                    <h5>Class-VI</h5>
                                    <p>{{$schooldetails['seats']->class_six}}</p>
                                </li>
                                <li>
                                    <h5>Class-VII</h5>
                                    <p>{{$schooldetails['seats']->class_seven}}</p>
                                </li>
                                <li>
                                    <h5>Class-VIII</h5>
                                    <p>{{$schooldetails['seats']->class_eight}}</p>
                                </li>
                                <li>
                                    <h5>Class-IX</h5>
                                    <p>{{$schooldetails['seats']->class_nine}}</p>
                                </li>
                                <li>
                                    <h5>Class-X</h5>
                                    <p>{{$schooldetails['seats']->class_ten}}</p>
                                </li>
                                <li>
                                    <h5>Class-XI</h5>
                                    <p>{{$schooldetails['seats']->class_eleven}}</p>
                                </li>
                                <li>
                                    <h5>Class-XII</h5>
                                    <p>{{$schooldetails['seats']->class_twelve}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="account-card alert fade show box-2px">
                    <div class="account-title">
                        <h3>Facilities</h3>
                        <!--button data-dismiss="alert">close</button-->
                    </div>
                    <?php
                    $education_number = 0;
                    $education = array("Library", "Career Counsiling", "Student Exchange", "Digital Library", "Counseling", "Test Center");
                    $education1 = array_fill(1, 6, null);
                    $i = 1;
                    ?>

                    @if($features=json_decode($schooldetails['facilities']->education))

                    @foreach($features as $feature)
                    <?php
                    $education_number++;
                    ?>
                    @endforeach
                    @endif
                    <div class="dash-content" id="facilities">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dash-review-widget">
                                    <h5 class="text-uppercase">Education Facilities </h5>
                                    <span>
                                        <h5>(<?php echo $education_number; ?>/6)</h5>
                                    </span>
                                </div>
                            </div>

                            @if($features=json_decode($schooldetails['facilities']->education))

                            @foreach($features as $feature)
                            <div class="col-lg-4">
                                <ul class="account-card-link">
                                    <li><i class="fas fa-check-circle text-success"></i><span>
                                            <?php
                                            $education_number++;
                                            echo $feature;
                                            $education1[$i] = $feature;
                                            ?></span>
                                    </li>
                                </ul>
                            </div>
                            <?php $i++; ?>
                            @endforeach
                            @endif
                            <?php
                            $result = array();
                            $result = array_diff($education, $education1);
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="col-lg-4">
                                    <ul class="account-card-link">
                                        <li><i class="far fa-times-circle text-muted"></i><span>
                                                <?php
                                                echo $value;
                                                ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                        <?php $class_number = 0; ?>
                        @if($features=json_decode($schooldetails['facilities']->classroom))

                        @foreach($features as $feature)
                        <?php
                        $class_number++;
                        ?>
                        @endforeach
                        @endif
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dash-review-widget infra-padding-20">
                                    <h5 class="text-uppercase">Classroom Facilities </h5>
                                    <span>
                                        <h5>(<?php echo $class_number; ?>/3)</h5>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $classroom = array("AC Class rooms", "AV Class rooms", "Lockers");
                            $classroom1 = array_fill(1, 3, null);
                            $i = 1;
                            ?>
                            @if($features=json_decode($schooldetails['facilities']->classroom))
                            @foreach($features as $feature)
                            <div class="col-lg-4">
                                <ul class="account-card-link">
                                    <li><i class="fas fa-check-circle text-success"></i>
                                        <span>
                                            <?php
                                            echo $feature;
                                            $classroom1[$i] = $feature;
                                            ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <?php $i++; ?>
                            @endforeach
                            @endif
                            <?php
                            $result = array();
                            $result = array_diff($classroom, $classroom1);
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="col-lg-4">
                                    <ul class="account-card-link">
                                        <li><i class="far fa-times-circle text-muted"></i><span>
                                                <?php
                                                echo $value;
                                                ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dash-review-widget infra-padding-20">
                                    <h5 class="text-uppercase">Laboratories Facilities </h5>
                                    <?php $lab_number = 0; ?>
                                    @if($features=json_decode($schooldetails['facilities']->lab))
                                    @foreach($features as $feature)
                                    <?php $lab_number++; ?>
                                    @endforeach
                                    @endif
                                    <span>
                                        <h5>(<?php echo $lab_number; ?>/3)</h5>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $lab = array("Laboratories", "Computer Labs", "Robotics Labs", "Maths Labs", "Language Lab");
                            $lab1 = array_fill(1, 5, null);
                            $i = 1;
                            ?>
                            @if($features=json_decode($schooldetails['facilities']->lab))
                            @foreach($features as $feature)
                            <div class="col-lg-4">
                                <ul class="account-card-link">
                                    <li><i class="fas fa-check-circle text-success"></i>
                                        <span>
                                            <?php echo $feature;
                                            $lab1[$i] = $feature;
                                            $i++; ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            @endif
                            <?php
                            $result = array();
                            $result = array_diff($lab, $lab1);
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="col-lg-4">
                                    <ul class="account-card-link">
                                        <li><i class="far fa-times-circle text-muted"></i><span>
                                                <?php
                                                echo $value;
                                                ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dash-review-widget infra-padding-20">
                                    <h5 class="text-uppercase">Boarding Facilities </h5>
                                    <?php $board_number = 0; ?>
                                    @if($features=json_decode($schooldetails['facilities']->boarding))
                                    @foreach($features as $feature)
                                    <?php $board_number++; ?>
                                    @endforeach
                                    @endif
                                    <span>
                                        <h5>(<?php echo $board_number; ?>/2)</h5>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $boarding = array("Hostel", "AC Hostel");
                            $boarding1 = array_fill(1, 2, null);
                            $i = 1;
                            ?>
                            @if($features=json_decode($schooldetails['facilities']->boarding))
                            @foreach($features as $feature)
                            <div class="col-lg-4">
                                <ul class="account-card-link">
                                    <li><i class="fas fa-check-circle text-success"></i>
                                        <span>
                                            <?php
                                            echo $feature;
                                            $boarding1[$i] = $feature;
                                            $i++;
                                            ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            @endif
                            <?php
                            $result = array();
                            $result = array_diff($boarding, $boarding1);
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="col-lg-4">
                                    <ul class="account-card-link">
                                        <li><i class="far fa-times-circle text-muted"></i><span>
                                                <?php
                                                echo $value;
                                                ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php $sports_number = 0; ?>
                                <div class="dash-review-widget infra-padding-20">
                                    @if($features=json_decode($schooldetails['facilities']->sports))
                                    @foreach($features as $feature)
                                    <?php $sports_number++; ?>
                                    @endforeach
                                    @endif
                                    <h5 class="text-uppercase">Sports Facilities </h5>
                                    <span>
                                        <h5>(<?php echo $sports_number; ?>/14)</h5>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $sports = array("Play Area", "Badminton", "Cricket", "Covered Play Area", "Hockey", "Football", "Volleyball", "Tennis", "Kabaddi", "Swimming", "Table Tennis", "Athletics", "Gymnasium", "Karate");
                            $sports1 = array_fill(1, 14, null);
                            $i = 1;
                            ?>
                            @if($features=json_decode($schooldetails['facilities']->sports))
                            @foreach($features as $feature)
                            <div class="col-lg-4">
                                <ul class="account-card-link">
                                    <li><i class="fas fa-check-circle text-success"></i>
                                        <span>
                                            <?php echo $feature;
                                            $sports1[$i] = $feature;
                                            ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <?php $i++; ?>
                            @endforeach
                            @endif
                            <?php
                            $result = array();
                            $result = array_diff($sports, $sports1);
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="col-lg-4">
                                    <ul class="account-card-link">
                                        <li><i class="far fa-times-circle text-muted"></i>
                                            <?php
                                            echo $value;
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dash-review-widget infra-padding-20">
                                    <?php $art_number = 0; ?>
                                    @if($features=json_decode($schooldetails['facilities']->arts))
                                    @foreach($features as $feature)
                                    <?php $art_number++; ?>
                                    @endforeach
                                    @endif
                                    <h5 class="text-uppercase">Performing Arts Facilities </h5>
                                    <span>
                                        <h5>(<?php echo $art_number; ?>/4)</h5>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $arts = array("Art", "Dance", "Dramatics", "Music");
                            $arts1 = array_fill(1, 4, null);
                            $i = 1;
                            ?>
                            @if($features=json_decode($schooldetails['facilities']->arts))
                            @foreach($features as $feature)
                            <div class="col-lg-4">
                                <ul class="account-card-link">
                                    <li><i class="fas fa-check-circle text-success"></i>
                                        <span>
                                            <?php echo $feature;
                                            $arts1[$i] = $feature;
                                            $i++;
                                            ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            @endif
                            <?php
                            $result = array();
                            $result = array_diff($arts, $arts1);
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="col-lg-4">
                                    <ul class="account-card-link">
                                        <li><i class="far fa-times-circle text-muted"></i>
                                            <?php
                                            echo $value;
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dash-review-widget infra-padding-20">
                                    <h5 class="text-uppercase">Digital Facilities </h5>
                                    <?php $digital_number = 0; ?>
                                    @if($features=json_decode($schooldetails['facilities']->digital))
                                    @foreach($features as $feature)
                                    <?php $digital_number++; ?>
                                    @endforeach
                                    @endif
                                    <span>
                                        <h5>(<?php echo $digital_number; ?>/14)</h5>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $digital = array("AV Facilities", "Interactive Boards", "School App", "Wi-fi");
                            $digital1 = array(1, 4, null);
                            $i = 1;
                            ?>
                            @if($features=json_decode($schooldetails['facilities']->digital))
                            @foreach($features as $feature)
                            <div class="col-lg-4">
                                <ul class="account-card-link">
                                    <li><i class="fas fa-check-circle text-success"></i>
                                        <span>
                                            <?php
                                            echo $feature;
                                            $digital1[$i] = $feature;
                                            $i++;
                                            ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            @endif
                            <?php
                            $result = array();
                            $result = array_diff($digital, $digital1);
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="col-lg-4">
                                    <ul class="account-card-link">
                                        <li><i class="far fa-times-circle text-muted"></i>
                                            <span>
                                                <?php
                                                echo $value;
                                                ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dash-review-widget infra-padding-20">
                                    <h5 class="text-uppercase">FOOD AND CATERING FACILITIES </h5>
                                    <?php $food_number = 0; ?>
                                    @if($features=json_decode($schooldetails['facilities']->food))
                                    @foreach($features as $feature)
                                    <?php $food_number++; ?>
                                    @endforeach
                                    @endif
                                    <span>
                                        <h5>(<?php echo $food_number; ?>/14)</h5>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $food = array("Canteen", "Meal Served", "School App", "Kitchen & Dining Hall");
                            $food1 = array(1, 4, null);
                            $i = 1;
                            ?>
                            @if($features=json_decode($schooldetails['facilities']->food))
                            @foreach($features as $feature)
                            <div class="col-lg-4">
                                <ul class="account-card-link">
                                    <li><i class="fas fa-check-circle text-success"></i>
                                        <span>
                                            <?php
                                            echo $feature;
                                            $food1[$i] = $feature;
                                            $i++;
                                            ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            @endif
                            <?php
                            $result = array();
                            $result = array_diff($food, $food1);
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="col-lg-4">
                                    <ul class="account-card-link">
                                        <li><i class="far fa-times-circle text-muted"></i>
                                            <span>
                                                <?php
                                                echo $value;
                                                ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dash-review-widget infra-padding-20">
                                    <h5 class="text-uppercase">Safety and Security Facilities </h5>
                                    <?php $security_number = 0; ?>
                                    @if($features=json_decode($schooldetails['facilities']->security))
                                    @foreach($features as $feature)
                                    <?php $security_number++; ?>
                                    @endforeach
                                    @endif
                                    <span>
                                        <h5>(<?php echo $security_number; ?>/14)</h5>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $safety = array("CCTV", "Fire Alarm", "Fire Extinguisher", "Security Guards", "Boundary Wall", "Fenced Boundary Wall", "Speedometer in Bus", "GPS in Bus", "CCTV in Bus", "Fire Extinguisher in Bus", "School Bus Tracking App");
                            $safety1 = array(1, 11, null);
                            $i = 1;
                            ?>
                            @if($features=json_decode($schooldetails['facilities']->security))
                            @foreach($features as $feature)
                            <div class="col-lg-4">
                                <ul class="account-card-link">
                                    <li><i class="fas fa-check-circle text-success"></i>
                                        <span>
                                            <?php
                                            echo $feature;
                                            $safety1[$i] = $feature;
                                            $i++;
                                            ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            @endif
                            <?php
                            $result = array();
                            $result = array_diff($safety, $safety1);
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="col-lg-4">
                                    <ul class="account-card-link">
                                        <li><i class="far fa-times-circle text-muted"></i>
                                            <span>
                                                <?php
                                                echo $value;
                                                ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dash-review-widget infra-padding-20">
                                    <h5 class="text-uppercase">Medical Facility Facilities </h5>
                                    <?php $medical_number = 0; ?>
                                    @if($features=json_decode($schooldetails['facilities']->medical))
                                    @foreach($features as $feature)
                                    <?php $medical_number++; ?>
                                    @endforeach
                                    @endif
                                    <span>
                                        <h5>(<?php echo $medical_number; ?>/14)</h5>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $medical = array("Medical Facility", "Medical Room or Clinic", "ICU", "Medical Staff", "Isolation Room", "Dedicated Ambulance", "Resident Doctor");
                            $medical1 = array(1, 7, null);
                            $i = 1;
                            ?>
                            @if($features=json_decode($schooldetails['facilities']->medical))
                            @foreach($features as $feature)
                            <div class="col-lg-4">
                                <ul class="account-card-link">
                                    <li><i class="fas fa-check-circle text-success"></i>
                                        <span>
                                            <?php
                                            echo $feature;
                                            $medical1[$i] = $feature;
                                            $i++;
                                            ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            @endif
                            <?php
                            $result = array();
                            $result = array_diff($medical, $medical1);
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="col-lg-4">
                                    <ul class="account-card-link">
                                        <li><i class="far fa-times-circle text-muted"></i>
                                            <span>
                                                <?php
                                                echo $value;
                                                ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dash-review-widget infra-padding-20">
                                    <h5 class="text-uppercase">Other Infra Facilities </h5>
                                    <?php $other_number = 0; ?>
                                    @if($features=json_decode($schooldetails['facilities']->infra))
                                    @foreach($features as $feature)
                                    <?php $other_number++; ?>
                                    @endforeach
                                    @endif
                                    <span>
                                        <h5>(<?php echo $other_number; ?>/14)</h5>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $other = array("Kids Play Area", "Activity Center", "Toy Room", "Amphitheatre", "Auditorium", "Day Care");
                            $other1 = array(1, 6, null);
                            $i = 0;
                            ?>
                            @if($features=json_decode($schooldetails['facilities']->infra))
                            @foreach($features as $feature)
                            <div class="col-lg-4">
                                <ul class="account-card-link">
                                    <li><i class="fas fa-check-circle text-success"></i>
                                        <span>
                                            <?php
                                            echo $feature;
                                            $other1[$i] = $feature;
                                            $i++;
                                            ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            @endif
                            <?php
                            $result = array();
                            $result = array_diff($other, $other1);
                            foreach ($result as $key => $value) {
                            ?>
                                <div class="col-lg-4">
                                    <ul class="account-card-link">
                                        <li><i class="far fa-times-circle text-muted"></i>
                                            <span>
                                                <?php
                                                echo $value;
                                                ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="account-card alert fade show box-2px">
                    <div class="account-title">
                        <h3>
                            <!--b360&deg; View & -->Gallery
                        </h3>
                        <!--button data-dismiss="alert">close</button-->
                    </div>
                    <div class="dash-content">
                        <div class="common-card">
                            <div class="ad-details-slider-group">
                                <div class="ad-details-slider slider-arrow">
                                    @if($features=$schooldetails['images']->school_image)
                                    @foreach($features as $feature)
                                    <div><img src="{{$feature}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></div>
                                    @endforeach
                                    @endif
                                </div>
                                <!--div class="cross-vertical-badge ad-details-badge"><i class="fas fa-clipboard-check"></i><span>recommend</span></div-->
                            </div>
                            <div class="ad-thumb-slider">
                                @if($features=$schooldetails['images']->school_image)
                                @foreach($features as $feature)
                                <div><img src="{{$feature}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></div>
                                @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">

                <div class="account-card alert fade show box-2px">
                    <div class="account-title">
                        <h3>Opening Hours</h3>
                        <!--button data-dismiss="alert">close</button-->
                    </div>
                    <?php $flag = 0; ?>
                    <ul class="account-card-list">
                        <li>
                            <h5>Monday</h5>
                            @foreach($schooldetails['hours']?->mon as $hour)
                            <?php
                            $abc = App\Models\SchoolHour::getTime($hour);
                            if ($abc == "12:00 AM" && $flag != 1) {
                                $flag = 1;

                                echo "
                        <label>Closed</label>
                    ";
                            } elseif ($flag != 1) {
                            ?>
                                <label style="padding-left: 15px;">{{App\Models\SchoolHour::getTime($hour)}}</label>&nbsp;&nbsp;
                                @if($loop->iteration==2)
                                @break

                                @endif
                            <?php } ?>
                            @endforeach

                        </li>
                        <li>
                            <h5>Tuesday</h5>
                            @foreach($schooldetails['hours']?->tue as $hour)
                            <?php
                            $abc = App\Models\SchoolHour::getTime($hour);
                            if ($abc == "12:00 AM" && $flag != 1) {
                                $flag = 1;

                                echo "
                        <label>Closed</label>
                    ";
                            } elseif ($flag != 1) {
                            ?>
                                <label style="padding-left: 15px;">{{App\Models\SchoolHour::getTime($hour)}}</label>&nbsp;&nbsp;
                                @if($loop->iteration==2)
                                @break

                                @endif
                            <?php } ?>
                            @endforeach
                        </li>
                        <li>
                            <h5>Wednesday</h5>
                            @foreach($schooldetails['hours']?->wed as $hour)
                            <?php
                            $abc = App\Models\SchoolHour::getTime($hour);
                            if ($abc == "12:00 AM" && $flag != 1) {
                                $flag = 1;

                                echo "
                        <label>Closed</label>
                    ";
                            } elseif ($flag != 1) {
                            ?>
                                <label>{{App\Models\SchoolHour::getTime($hour)}}</label>&nbsp;&nbsp;
                                @if($loop->iteration==2)
                                @break

                                @endif
                            <?php } ?>
                            @endforeach
                        </li>
                        <li>
                            <h5>Thursday</h5>
                            @foreach($schooldetails['hours']?->thu as $hour)
                            <?php
                            $abc = App\Models\SchoolHour::getTime($hour);
                            if ($abc == "12:00 AM" && $flag != 1) {
                                $flag = 1;

                                echo "
                        <label>Closed</label>
                    ";
                            } elseif ($flag != 1) {
                            ?>
                                <label style="padding-left: 15px;">{{App\Models\SchoolHour::getTime($hour)}}</label>&nbsp;&nbsp;
                                @if($loop->iteration==2)
                                @break

                                @endif
                            <?php } ?>
                            @endforeach
                        </li>
                        <li>
                            <h5>Friday</h5>
                            @foreach($schooldetails['hours']?->fri as $hour)
                            <?php
                            $abc = App\Models\SchoolHour::getTime($hour);
                            if ($abc == "12:00 AM" && $flag != 1) {
                                $flag = 1;

                                echo "
                        <label>Closed</label>
                    ";
                            } elseif ($flag != 1) {
                            ?>
                                <label style="padding-left: 25px;">{{App\Models\SchoolHour::getTime($hour)}}</label>&nbsp;&nbsp;
                                @if($loop->iteration==2)
                                @break

                                @endif
                            <?php } ?>
                            @endforeach
                        </li>
                        <li>
                            <h5>Saturday</h5>
                            @foreach($schooldetails['hours']?->sat as $hour)
                            <?php
                            $abc = App\Models\SchoolHour::getTime($hour);
                            if ($abc == "12:00 AM" && $flag != 1) {
                                $flag = 1;

                                echo "
                        <label>Closed</label>
                    ";
                            } elseif ($flag != 1) {
                            ?>
                                <label>{{App\Models\SchoolHour::getTime($hour)}}</label>&nbsp;&nbsp;
                                @if($loop->iteration==2)
                                @break

                                @endif
                            <?php } ?>
                            @endforeach
                        </li>
                        <li>
                            <h5>Sunday</h5>
                            @foreach($schooldetails['hours']?->sun as $hour)
                            <?php
                            $abc = App\Models\SchoolHour::getTime($hour);
                            if ($abc == "12:00 AM" && $flag != 1) {
                                $flag = 1;

                                echo "
                        <label>Closed</label>
                    ";
                            } elseif ($flag != 1) {
                            ?>
                                <label>{{App\Models\SchoolHour::getTime($hour)}}</label>&nbsp;&nbsp;
                                @if($loop->iteration==2)
                                @break

                                @endif
                            <?php } ?>
                            @endforeach
                        </li>
                    </ul>
                </div>
                @if(Auth::user() && Auth::user()->role==3)
                <div class="account-card">
                    <div class="account-title">
                        <h3>Enquiry form</h3>
                        <!--button data-dismiss="alert">close</button-->
                    </div>
                    
                    <form action="{{ route('user.enquiry.post')}}" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="question" name="question" required="required">
                            <input type="hidden" name="school_id" value="{{$schooldetails->id}}"/>
    </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="message" name="message" required></textarea>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-inline review-submit"><i class="fas fa-tint"></i><span>submit your query</span></button>
                        </div>
                    </form>
                    
                </div>
                @endif

            </div>


        <div class="row" id="review"></div>
        <!--problem -->
        <div class="row">
            <div class="col-lg-8">
                <div class="account-card alert fade show box-2px">
                    <div class="account-title">
                        <h3>Drop your Review</h3>
                        <!--button data-dismiss="alert">close</button-->
                    </div>
                    <form class="review-form" action="{{route('school.review.add')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="school_id" value="{{$schooldetails->id}}">
                        <div class="star-rating">
                            <input type="radio" name="rating" id="star-1" value="5">
                            <label for="star-1"></label>
                            <input type="radio" name="rating" id="star-2" value="4">
                            <label for="star-2"></label>
                            <input type="radio" name="rating" id="star-3" value="3">
                            <label for="star-3"></label>
                            <input type="radio" name="rating" id="star-4" value="2">
                            <label for="star-4"></label>
                            <input type="radio" name="rating" id="star-5" value="1">
                            <label for="star-5"></label>
                        </div>
                        <div class="review-form-grid">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" name="name" required="required">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" required="required">
                            </div>
                            <div class="form-group">
                                <input type="phone" class="form-control" placeholder="Mobile" name="mobile" required="required">
                            </div>

                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Describe" name="description" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-inline review-submit"><i class="fas fa-tint"></i><span>drop your review</span></button>
                    </form>
                    <div class="dash-review-widget dash-review-widget-1">
                        <!--h4>(4) Unread Review</h4-->
                        <select class="custom-select" id="select-rating" onchange="getSchoolReviews(this.value)">
                            <option value="0" selected>All Review</option>
                            <option value="5">5 Star Review</option>
                            <option value="4">4 Star Review</option>
                            <option value="3">3 Star Review</option>
                            <option value="2">2 Star Review</option>
                            <option value="1">1 Star Review</option>
                        </select>
                    </div>
                    <ul class="review-list" id="review-list">

                    </ul>
                    <ul class="pagination">
                        <div style="margin:auto">
                            <button class="btn btn-primary btn-sm" id="load" onclick="loadData()">load more</button>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="section recomend-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Recommended <span style="color: #000066; font-style:italic;">Schools</span></h2>
                    <p>The schools with excellent educational values and top facilities and also recommended by School Dekho</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="recomend-slider slider-arrow">
                    @foreach($recommended_schools as $schools)
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-img img-center"><img src="{{$schools->school_logo}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></div>
                            <div class="product-type">
                                @if($schools->is_admission)
                                <span class="flat-badge rent">Admission Open</span>
                                @else
                                <span class="flat-badge sale">Admission Closed</span>
                                @endif
                            </div>
                            <ul class="product-action">

                            </ul>
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">

                            </ol>
                            <h5 class="product-title"><a href="ad-details-left.html">{{$schools->name}}<i class="fas fa-check-circle text-primary" title="Verified by School Dekho"></i></a> </h5>
                            <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>{{$schools->address?->address}}</span>
                                <!--span><i class="fas fa-clock"></i>30 min ago</span-->
                            </div>
                            <div class="product-info">
                                <a href="{{url('schooldetails/'.$schools->id)}}" class="blog-read"><span>Go to School</span><i class="fas fa-long-arrow-alt-right"></i></a>

                                <div class="review-meta">
                                    <ul>
                                        <li><i class="fas fa-star active"></i></li>

                                        <li>
                                            <h5> {{$schools->rating}}/5.0</h5>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="center-50"><a href="{{url('search')}}" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all recommend</span></a></div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
<script>
    var page = 1;
    var rating = "";
    getSchoolReviews("");

    function getSchoolReviews(rat) {

        var url = `/school/review/list?id={{$schooldetails->id}}&rating=${rat}`;

        console.log(url);
        rating = rat;

        $.ajax({
            type: "GET",
            url: url,
            success: function(data) {
                $("#review-list").html(data);

            }
        });

    }

    var page = 1;

    function loadData() {
        $("#load").attr('disabled', true);
        page = page + 1;
        var url = `/school/review/list?id={{$schooldetails->id}}&rating=${rating}&page=${page}`;
        //console.log(url);
        $.ajax({
            type: "GET",
            url: url,
            success: function(data) {
                $("#review-list").append(data);
                $("#load").attr('disabled', false);
            }
        });
    }

    function AddedForCompare() {
        var url = `/school/addtocompare/{{$schooldetails->id}}`;
        swal({
            title: "Added",
            text: "You have added this school for compare. Now click on compare button",
            type: "success"
        }).then(function() {
            window.location = url;
        });
    }
</script>
@endpush