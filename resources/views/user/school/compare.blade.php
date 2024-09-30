<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta name="email" content="">
    <meta name="profile" content="">
    <meta name="name" content="School Dekho">
    <meta name="type" content="School Search Portal">
    <meta name="title" content="School Dekho - India's First Search Engine for School Admissions">
    <meta name="keywords" content="">
    <title>Comapre Schools | School Dekho | Best School near me | Indias first school search portal | Dekho Phir Chuno</title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/font-awesome/fontawesome.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/main.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/dashboard.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/index.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/slick.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/ad-details.css">

    <style>
        .blog-sidebar-title h5 {
            font-weight: 500;
            text-transform: none;
            font-size: 14px;
        }

        .blog-src input {
            width: 100%;
            height: 30px;
            border-radius: 50px;
            padding: 0px 10px 0px 15px;
            border: 1px solid #ddd;
        }

        .review-avatar img {
            width: 35px;
            border-radius: 50%;
            border: 2px solid var(--white);
        }

        .table-head {
            box-shadow: none;
        }

        .table-head tr {
            background: #fff;

        }

        .table-list {
            width: 100%;
            box-shadow: 0 0 5px #ccc;
            background: #fff;
        }

        input::-webkit-input-placeholder {
            font-size: 15px;
            line-height: 3;
        }

        .table-head tr th {
            border-right: 1px solid #eee;
            color: #000066;
            text-transform: none;
        }

        .inner-section {
            margin-bottom: 0px;
            margin-top: 20px;
        }

        .img-center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        .flat-badge {
            font-size: 12px;
            padding: 2px 14px;
            line-height: 220px;
            margin-right: 105px;
            border-radius: 20px;
        }

        .gcolor {
            color: #777;
        }

        .box-2px {
            box-shadow: 0 0 1px #ccc;
        }

        .box-2px:hover {
            box-shadow: 0 0 3px #ccc;
        }

        .dash-menu-list ul {
            border-top: 1px solid #eee;
        }

        .section-center-heading {
            margin-top: -100px;
        }

        .center-50 {
            padding-bottom: 100px;
        }

        .dash-review-widget-1 {
            margin-top: 50px;
        }

        .dash-header-part {
            background: #fff;
            margin-top: 0px;
            position: relative;
            z-index: 1;
        }

        .dash-avatar a {
            border-radius: 50%;
            border: 1px solid #ddd;

        }

        .dash-focus {
            background: url(../../images/bg/04.png) !important;
            opacity: 1 !important;
        }

        .dash-focus::before {

            opacity: 1;

        }

        .dash-rev::before {
            background-color: rgb(0 123 255 / 50%);

        }

        .account-card-link li a {
            color: #555;
        }

        .review-avatar {
            border: 1px solid var(--primary);
        }

        @media (min-width: 900px) {
            .dash-focus:last-child {
                margin-top: 50px;
            }

            .dash-focus::before {
                height: 60%;
            }

            .review-submit {
                margin-top: 10px;
            }

            .varified {
                display: none;
                font-size: 0.8rem;
                font-style: italic;
                font-weight: 500;
                text-align: center;
            }

            .varfied:hover {
                display: block;
            }
        }

        .blog-sidebar {
            padding: 0px 0px;
            margin-bottom: 0px;
            background: var(--chalk);
            border-radius: 8px;
            border: 0px solid var(--border);
        }

        .dash-review-widget {
            margin-bottom: 10px;
            border-bottom: 2px solid #eee;
        }

        .dashboard-banner {
            padding: 10px 0px 10px;
            box-shadow: 0 5px 5px -5px #ccc;
        }

        .single-banner::before {
            background: #fff;

        }

        .single-content h2 {
            color: #000066;
        }

        @media (min-width: 900px) {
            .fa-times-circle:hover {
                content: "\f057";
                background-color: #fff;
            }

            .dash-header-alert {
                margin: 0px;
                margin-top: -10px;
                padding: 0px 165px;
                ;
                box-shadow: none;
                border-left: 0px solid #ddd;

            }

            .dash-header-alert button {
                margin-left: 0px;
            }

            .dash-header-card {
                padding: 15px 0px 0px 0px;
                background: var(--white);
                border-radius: 0px;
            }

            .dash-menu-list {
                margin-top: 15px;
            }

            .review-submit {
                width: 100%;
                padding: 10px 30px;
            }

            .dashboard-part {
                padding: 30px 0px 70px;
            }

            .infra-padding-20 {
                margin-top: 20px;
            }

        }

        @media (max-width: 767px) {
            .dash-avatar {
                margin-right: 0px;
                margin-bottom: 20px;
            }

            .mobile-nav {
                border-radius: 0px 0px 0px 0px;
            }

            .padding-top-20 {
                padding-top: 40px;
            }

            .review-submit {
                margin-top: 10px;
            }

            .account-card-link li:last-child {
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    @include('layouts.frontend.partials.header')
    @include('layouts.frontend.partials.sidebar')
    <nav class="mobile-nav">
        <div class="container">
            <div class="mobile-group">
                <a href="index.html" class="mobile-widget">
                    <!--i class="fas fa-home"></i--><span>school 1</span>
                </a>
                <a href="notification.html" class="mobile-widget">
                    <!--i class="fas fa-bell"></i--><span>school 2</span>
                    <!--sup>0</sup-->
                </a>
                <a href="user-form.html" class="mobile-widget">
                    <!--i class="fas fa-user"></i--><span>school 3</span>
                </a>
                <!--a href="ad-post.html" class="mobile-widget plus-btn">
					<i class="fas fa-plus"></i><span>Ad Post</span>
				</a-->

            </div>
        </div>
    </nav>
    <section class="single-banner dashboard-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content" style="text-align: right;">
                        <h6 class="small" style="font-weight: 400; ">*Comparison is based on the features of the schools.</h6>
                        <!--ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">dashboard</li>
						</ol-->
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--section class="dash-header-part fixed" style = "box-shadow: 0 5px 5px -5px #ccc;">
		<div class="container">
			<div class="dash-header-card">
				<div class="row">
					
					Compare Schools
					
				</div>
				
			</div>
		</div>
	</section-->


    <section class="inner-section compare-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-scroll">
                        <table class="table-list">
                            <thead class="table-head">

                                <tr>
                                    <th scope="col">Features</th>
                                    @foreach($all_schools as $school)
                                    <th scope="col">
                                        <div class="blog-sidebar">
                                            <div class="blog-sidebar-title">
                                                <div class="review-profile">
                                                    <a href="#" class="review-avatar"><img src="{{$school->school_logo}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                                                    <div class="review-meta">
                                                        <h5>{{$school->name}} <button><a href="{{url('/school/compare/remove/'.$school->id)}}"><i class="far fa-times-circle data-dismiss text-muted"></i></a></button></h5>
                                                        <!--p>Some where on Earth</p-->
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </th>
                                    @endforeach

                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <tr>
                                    <td class="table-number">
                                        <h6>Board</h6>
                                    </td>
                                    @foreach($all_schools as $school)
                                    <td class="table-category">{{$school->boards->board_name}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                            <tbody class="table-body">
                                <tr>
                                    <td class="table-number">
                                        <h6>School Type</h6>
                                    </td>
                                    @foreach($all_schools as $school)
                                    <td class="table-category">{{$school->school_type}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                            <tbody class="table-body">
                                <tr>
                                    <td class="table-number">
                                        <h6>Medium</h6>
                                    </td>
                                    @foreach($all_schools as $school)
                                    <td class="table-category">{{$school->medium->medium}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                            <tbody class="table-body">
                                <tr>
                                    <td class="table-number">
                                        <h6>Library</h6>
                                    </td>
                                    @foreach($all_schools as $school)
                                    @if(in_array("Library",json_decode($school->facilities->education)??[]))
                                    <td class="table-category"><i class="fas fa-check-circle text-success"></i></td>
                                    @else
                                    <td class="table-category"><i class="far fa-times-circle text-muted"></i></td>
                                    @endif
                                    @endforeach
                                </tr>
                            </tbody>
                            <tbody class="table-body">
                                <tr>
                                    <td class="table-number">
                                        <h6>AC rooms</h6>
                                    </td>
                                    @foreach($all_schools as $school)
                                    @if(in_array("AC Class rooms",json_decode($school->facilities->classroom)??[]))
                                    <td class="table-category"><i class="fas fa-check-circle text-success"></i></td>
                                    @else
                                    <td class="table-category"><i class="far fa-times-circle text-muted"></i></td>
                                    @endif
                                    @endforeach
                                </tr>
                            </tbody>
                            <tbody class="table-body">
                                <tr>
                                    <td class="table-number">
                                        <h6>Computer Lab</h6>
                                    </td>
                                    @foreach($all_schools as $school)
                                    @if(in_array("Computer Labs",json_decode($school->facilities->lab)??[]))
                                    <td class="table-category"><i class="fas fa-check-circle text-success"></i></td>
                                    @else
                                    <td class="table-category"><i class="far fa-times-circle text-muted"></i></td>
                                    @endif
                                    @endforeach
                                </tr>
                            </tbody>
                            <tbody class="table-body">
                                <tr>
                                    <td class="table-number">
                                        <h6>Hostel</h6>
                                    </td>
                                    @foreach($all_schools as $school)
                                    @if(in_array("Hostel",json_decode($school->facilities->boarding)??[]))
                                    <td class="table-category"><i class="fas fa-check-circle text-success"></i></td>
                                    @else
                                    <td class="table-category"><i class="far fa-times-circle text-muted"></i></td>
                                    @endif
                                    @endforeach
                                </tr>
                            </tbody>
                            <tbody class="table-body">
                                <tr>
                                    <td class="table-number">
                                        <h6>Wi-fi</h6>
                                    </td>
                                    @foreach($all_schools as $school)
                                    @if(in_array("Wi-fi",json_decode($school->facilities->digital)??[]))
                                    <td class="table-category"><i class="fas fa-check-circle text-success"></i></td>
                                    @else
                                    <td class="table-category"><i class="far fa-times-circle text-muted"></i></td>
                                    @endif
                                    @endforeach
                                </tr>
                            </tbody>
                            <tbody class="table-body">
                                <tr>
                                    <td class="table-number">
                                        <h6>CCTV</h6>
                                    </td>
                                    @foreach($all_schools as $school)
                                    @if(in_array("CCTV",json_decode($school->facilities->security)??[]))
                                    <td class="table-category"><i class="fas fa-check-circle text-success"></i></td>
                                    @else
                                    <td class="table-category"><i class="far fa-times-circle text-muted"></i></td>
                                    @endif
                                    @endforeach
                                </tr>
                            </tbody>
                            <tbody class="table-body">
                                <tr>
                                    <td class="table-number">
                                        <h6>School App</h6>
                                    </td>
                                    @foreach($all_schools as $school)
                                    @if(in_array("School App",json_decode($school->facilities->food)??[]))
                                    <td class="table-category"><i class="fas fa-check-circle text-success"></i></td>
                                    @else
                                    <td class="table-category"><i class="far fa-times-circle text-muted"></i></td>
                                    @endif
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="compare-btn center-50"><a href="#" class="btn btn-inline"><i class="fas fa-eye"></i><span>show more list</span></a></div>
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
                                <div class="product-img img-center"><img style=" " src="{{$schools->school_logo}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></div>
                                <!--div class="cross-vertical-badge product-badge"><i class="fas fa-check-circle"></i><span>Varified</span></div-->
                                <div class="product-type">
                                    @if($schools->is_admission)
                                    <span class="flat-badge rent">Admission Open</span>
                                    @else
                                    <span class="flat-badge sale">Admission Closed</span>
                                    @endif
                                </div>

                            </div>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <!--li><i class="fas fa-users"></i></li>
										<li class="breadcrumb-item active" aria-current="page">Girls</li>
										<li class="breadcrumb-item " >CBSE</li-->
                                </ol>
                                <h5 class="product-title"><a href="ad-details-left.html">{{$schools->name}}<i class="fas fa-check-circle text-primary" title="Verified by School Dekho"></i></a> </h5>
                                <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>{{$schools->address?->address}}</span>
                                    <!--span><i class="fas fa-clock"></i>30 min ago</span-->
                                </div>
                                <div class="product-info">
                                    <a href="{{route('details'.$schools->id)}}" class="blog-read"><span>Go to School</span><i class="fas fa-long-arrow-alt-right"></i></a>

                                    <div class="review-meta">
                                        <ul>
                                            <li><i class="fas fa-star active"></i></li>
                                            <!--li><i class="fas fa-star active"></i></li>
												<li><i class="fas fa-star active"></i></li>
												<li><i class="fas fa-star active"></i></li>
												<li><i class="fas fa-star "></i></li-->
                                            <li>
                                                <h5> {{$schools->rating}}/5.0</h5>
                                            </li>
                                            <!--li class=""> &nbsp; &nbsp;<i class="fas fa-eye text-success"></i> </li-->
                                            <!--li class=""> <h5 class = "text-secondary"> 79</h5>  </li-->
                                            <!--li class=""> <h6 class = "text-secondary"> Views</h6>  </li-->
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
                    <div class="center-50"><a href="ad-list-column3.html" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all recommend</span></a></div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.frontend.partials.footer')
    <div class="modal fade" id="currency">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Choose a Currency</h4>
                    <button class="fas fa-times" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <button class="modal-link active">United States Doller (USD) - $</button>
                    <button class="modal-link">Euro (EUR) - €</button>
                    <button class="modal-link">British Pound (GBP) - £</button>
                    <button class="modal-link">Australian Dollar (AUD) - A$</button>
                    <button class="modal-link">Canadian Dollar (CAD) - C$</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="language">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Choose a Language</h4>
                    <button class="fas fa-times" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <button class="modal-link active">English</button>
                    <button class="modal-link">bangali</button>
                    <button class="modal-link">arabic</button>
                    <button class="modal-link">germany</button>
                    <button class="modal-link">spanish</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets')}}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/popper.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/custom/main.js"></script>
    <script src="{{asset('assets')}}/js/vendor/slick.min.js"></script>
    <script src="{{asset('assets')}}/js/custom/slick.js"></script>
    <script src="{{asset('assets')}}/js/sweetalert.min.js"></script>
    @if($message = Session::get("msg"))
    <script>
        swal("No School added", "Please add school for comparison", "warning");
    </script>

    @endif
</body>

<script>
    $("#search_key_header").keyup(function() {
        var keyword = $(this).val();
        $.ajax({
            type: "GET",
            url: `/school/search?key=${keyword}`,
            success: function(data) {
                if (keyword.length > 0) {
                    $("#suggesstion-box-header").show();
                    $("#suggesstion-box-header").html(data);
                    $("#search-box").css("background", "#FFF");
                } else {
                    $("#suggesstion-box-header").hide();
                }
            }
        });
    })
</script>

</html>