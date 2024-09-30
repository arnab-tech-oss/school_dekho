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
	<title>
		Search | School Dekho | Best School near me | Indias first school search portal | Dekho Phir Chuno
	</title>
	<link rel="icon" href="{{asset('assets')}}/images/favicon.png">
	<link rel="stylesheet" href="{{asset('assets')}}/fonts/flaticon/flaticon.css">
	<link rel="stylesheet" href="{{asset('assets')}}/fonts/font-awesome/fontawesome.css">
	<link rel="stylesheet" href="{{asset('assets')}}/css/vendor/slick.min.css">
	<link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('assets')}}/css/custom/main.css">

	<style>
		div.sticky {
			position: -webkit-sticky;
			position: sticky;
			top: 0;

		}

		.single-banner::before {
			background: #fff;
		}

		.product-title {
			margin-bottom: 0px;
		}

		.product-media::before {

			background: linear-gradient(rgba(0, 0, 0, 0) 100%, rgba(0, 0, 0, 0) 100%) !important;
		}

		@media (max-width: 575px) {
			.single-banner {
				padding: 15px 0px 0px;
			}

			.product-type {
				right: 47px;
			}

			.single-content {
				padding-top: 10px;
				padding-bottom: 20px;

			}

			.match-suggest {
				padding-bottom: 10px;
				text-align: center;
			}
		}

		@media (min-width: 900px) {
			.product-card {
				border-left: 3px solid #007bff;
			}

			.single-content {
				padding-top: 40px;
				padding-bottom: 30px;
				text-align: left;
			}

			.single-banner {
				padding: 10px 0px;
			}

			.inner-section {
				margin-bottom: 30px;
			}

			.ad-standard .product-card.standard .product-img img {
				width: 120px;
			}

			.ad-standard .product-card.standard .product-media {
				margin: 10px 10px;
			}

			.product-type {
				right: 30px;
			}

			.match-suggest {
				padding-bottom: 10px;
				text-align: left;

			}

			.inner-section {
				padding-top: 20px;
				border-top: 1px solid #eee;
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
				<a href="search.php#filters" class="mobile-widget">
					<!--i class="fas fa-home"></i--><span>Apply Filters</span>
				</a>
				<a href="search.php#top" class="mobile-widget">
					<!--i class="fas fa-home"></i--><span>Go to Top</span>
				</a>
			</div>
		</div>
	</nav>

	<section class="inner-section ad-list-part">
		<div class="container">
			<div class="row content-reverse">
				<div class="col-lg-4 col-xl-3">
					<div class="row sticky">
						<div class="col-md-6 col-lg-12">
							<div class="product-widget" id="filters">
								<h6 class="product-widget-title">Filter by Admission</h6>
								<form class="product-widget-form">
									<ul class="product-widget-list">
										<li class="product-widget-item">
											<div class="product-widget-checkbox">
												<input type="checkbox" id="chcek2" onchange="selected_admission(1)">
											</div>
											<?php $count = 0;

											foreach (explode(",", $admission_open) as $open) {
												$count++;
											}
											$closed_schools = $total_schools - $count;
											?>
											<label class="product-widget-label" for="chcek2"><span class="product-widget-type rent">Admission Open</span><span class="product-widget-number">({{$count}})</span></label>
										</li>
										<li class="product-widget-item">
											<div class="product-widget-checkbox">
												<input type="checkbox" id="chcek1" onchange="selected_admission_closed(1)">
											</div>
											<label class="product-widget-label" for="chcek1"><span class="product-widget-type sale">Closed</span><span class="product-widget-number">({{$closed_schools}})</span></label>
										</li>
									</ul>

								</form>
							</div>
						</div>
						<div class="col-md-6 col-lg-12">
							<div class="product-widget">
								<h6 class="product-widget-title">Filter by rating</h6>
								<form class="product-widget-form">
									<ul class="product-widget-list">
										@for($i=0;$i<=4;$i++) <li class="product-widget-item">
											<div class="product-widget-checkbox">
												<?php $l = 5 - $i; ?>
												<input type="checkbox" id="chcek4" onclick="selected_rating('{{$l}}')">
											</div>
											<label class="product-widget-label" for="chcek4">
												<span class="product-widget-star">
													@for($j=4;$j>=$i;$j--)
													<i class="fas fa-star"></i>
													@endfor

													@for($k=$j;$k>=0;$k--)
													<i class="far fa-star"></i>
													@endfor

												</span><span class="product-widget-number">({{$count_reviews[$i]}})</span></label>
											</li>
											@endfor
									</ul>
								</form>
							</div>
						</div>
						<div class="col-md-6 col-lg-12">
							<div class="product-widget">
								<h6 class="product-widget-title">Filter by Locations</h6>
								<form class="product-widget-form">
									<div class="product-widget-search">
										<input type="text" placeholder="Search" id="statesearch">
									</div>
									<ul class="product-widget-list product-widget-scroll" id="states">
										@foreach($states as $state)
										<li class="product-widget-item">
											<div class="product-widget-checkbox">
												<input type="checkbox" id="chcek9" onclick="selected_states('{{$state->id}}')">
											</div>
											<label class="product-widget-label" for="chcek9"><span class="product-widget-text">{{$state->state}}</span><span class="product-widget-number">({{sizeof($state->schools)}})</span></label>
										</li>
										@endforeach
									</ul>

								</form>
							</div>
						</div>
						<div class="col-md-6 col-lg-12">
							<div class="product-widget">
								<h6 class="product-widget-title">Filter by Board</h6>
								<form class="product-widget-form">
									<div class="product-widget-search">
										<input type="text" placeholder="Search">
									</div>
									<ul class="product-widget-list product-widget-scroll">
										@foreach($boards as $board)
										<li class="product-widget-item">
											<div class="product-widget-checkbox">
												<input type="checkbox" id="chcek9" onclick="selected_boards('{{$board->id}}')">
											</div>
											<label class="product-widget-label" for="chcek9"><span class="product-widget-text">{{$board->board_name}}</span><span class="product-widget-number">({{sizeof($board->schools)}})</span></label>
										</li>
										@endforeach
									</ul>

								</form>
							</div>
						</div>
						<div class="col-md-6 col-lg-12">
							<div class="product-widget">
								<h6 class="product-widget-title">Filter by Medium</h6>
								<form class="product-widget-form">
									<div class="product-widget-search">
										<input type="text" placeholder="Search">
									</div>
									<ul class="product-widget-list product-widget-scroll">
										@foreach($mediums as $medium)
										<li class="product-widget-item">
											<div class="product-widget-checkbox">
												<input type="checkbox" id="chcek9" onclick="selected_mediums('{{$medium->id}}')">
											</div>
											<label class="product-widget-label" for="chcek9"><span class="product-widget-text">{{$medium->medium}}</span><span class="product-widget-number">({{sizeof($medium->schools)}})</span></label>
										</li>
										@endforeach
									</ul>
								</form>
							</div>
						</div>

					</div>
				</div>
				<div class="col-lg-8 col-xl-9">
					<div class="single-content" id="top">
						<!--h2>ad List column 1</h2-->
						<h5>Showing search result for <span style="font-weight: 600; color: #000099;">"{{$search_key_values}}"</span></h5>
						<hr>

					</div>


					<div class="row ad-standard">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="match-suggest">

								<h6>Suggested by Us:</h6>

							</div>
						</div>
						<div id="school_list" class="col-12">

						</div>
						<div style="margin-bottom:5px;justify-content:center;display:flex" class="col-12">

							<button class="btn btn-primary" id="load" onclick="loadData()">load more</button>

						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="footer-pagection">
								<p class="page-info"></p>
								<ul class="pagination">

								</ul>
							</div>
						</div>
					</div>
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
	<script src="{{asset('assets')}}/js/vendor/slick.min.js"></script>
	<script src="{{asset('assets')}}/js/custom/slick.js"></script>
	<script src="{{asset('assets')}}/js/custom/main.js"></script>
	<script src="{{asset('assets')}}/js/sweetalert.min.js"></script>
	<script>

	</script>
	@if($message = Session::get("msg"))
	<script>
		swal("No School added", "Please add school for comparison", "warning");
	</script>

	@endif
	<script>
		var states = [];
		var boards = [];
		var mediums = [];
		var ratings = [];
		var admissions = [];
		var admission_closed = [];
		var current_location = {
			latitude: "",
			longitude: ""
		};

		var no_record = `<center><b style='color:red'>No more data</b></center>`;
		$(document).ready(function() {

			$('#statesearch').keyup(function(e) {
				$.ajax({
					type: "GET",
					url: `/state_filter?keywords=${e.target.value}`,
					success: function(data) {
						$("#states").html(data);
					}
				});
			})
		})

		function selected_admission(admission_status) {
			var index = admissions.indexOf(admission_status);
			if (index < 0) {
				admissions.push(admission_status);
			} else {
				admissions.splice(index, 1);
			}
			console.log(admissions);
			getSchools();
		}

		function selected_admission_closed(closed_status) {
			var index = admission_closed.indexOf(closed_status);
			if (index < 0) {
				admission_closed.push(closed_status);
			} else {
				admission_closed.splice(index, 1);
			}
			console.log(admission_closed);
			getSchools();
		}

		function selected_rating(rating) {
			var index = ratings.indexOf(rating);
			if (index < 0) {
				ratings.push(rating);
			} else {
				ratings.splice(index, 1);
			}
			getSchools();
		}

		function selected_states(state_id) {
			var index = states.indexOf(state_id);
			if (index < 0) {
				states.push(state_id);
			} else {

				states.splice(index, 1);
			}
			getSchools();

		}

		function selected_boards(board_id) {
			var index = boards.indexOf(board_id);
			if (index < 0) {
				boards.push(board_id);
			} else {
				boards.splice(index, 1);
			}
			getSchools();

		}

		function selected_mediums(medium_id) {
			var index = mediums.indexOf(medium_id);
			if (index < 0) {
				mediums.push(medium_id);
			} else {
				mediums.splice(index, 1);
			}

			getSchools();

		}
		//getSchools();


		function bindUrl() {

		}

		function getSchools() {
			page = 1;

			var url = `/schools/list?key={{$search_key_values}}&admissions=${admissions}&admission_closed=${admission_closed}&states=${states}&mediums=${mediums}&boards=${boards}&ratings=${ratings}&page=${page}&category={{$category}}&board={{$board_id}}&school_type={{$school_type}}`;
			console.log(url);

			$.ajax({
				type: "GET",
				url: url,
				success: function(data) {
					if ((data) && (data != "")) {
						$("#school_list").html(data);
						$("#load").show();
						$("#load").attr('disabled', false);

					} else {
						$("#school_list").html(no_record);
						$("#load").hide();
					}
				}
			});
		}

		var page = 1;

		function loadData() {
			$("#load").text("Loading..");
			page = page + 1;
			var url = `/schools/list?key={{$search_key_values}}&admissions=${admissions}&admission_closed=${admission_closed}&states=${states}&mediums=${mediums}&boards=${boards}&ratings=${ratings}&page=${page}&latitude=${current_location.latitude}&longitude=${current_location.longitude}&category={{$category}}&board={{$board_id}}&school_type={{$school_type}}`;
			console.log(url);
			$.ajax({
				type: "GET",
				url: url,
				success: function(data) {
					$("#load").text("Load More");
					if ((data) && (data != "")) {
						$("#school_list").append(data);
						$("#load").show();


					} else {
						$("#school_list").append(no_record);
						$("#load").hide();
					}

				}
			});
		}


		var page = 1;

		window.onload = function() {
			getLocation();
		};


		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			}
		}

		function showPosition(position) {

			current_location = {
				latitude: position.coords.latitude,
				longitude: position.coords.longitude
			}
			getCurrentLocationSchools(position.coords)

		}


		getCurrentLocationSchools({
			latitude: "",
			longitude: ""
		});


		function getCurrentLocationSchools(location_data) {
			var url = `/schools/list?key={{$search_key_values}}&latitude=${location_data.latitude}&longitude=${location_data.longitude}&category={{$category}}&board={{$board_id}}&school_type={{$school_type}}`;
			console.log(url);
			$.ajax({
				type: "GET",
				url: url,

				success: function(data) {

					if ((data) && (data != "")) {
						$("#school_list").html(data);
						$("#load").show();
						$("#load").attr('disabled', false);

					} else {
						$("#school_list").html(no_record);
						$("#load").hide();
					}

				}
			});
		}
	</script>
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
</body>

</html>