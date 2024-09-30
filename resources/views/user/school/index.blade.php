@extends('layouts.frontend.app')

@push('css')

@endpush

@section('content')
<style>
	.blog-details-meta li a i {
		color: #777;
	}

	.blog-details-meta li a p {
		color: #555;
	}

	.blog-details-meta li a {
		background-color: #dffbff;
		border: 1px solid #ddd;
		border-radius: 25px;

	}

	.blog-details-meta li a:hover {
		background-color: #000066;
	}

	.header-search-cover {
		/*border-radius: 50px;*/
		border: 1px solid #ddd;
		/*padding: 5px;*/
	}

	.header-search-cover:hover {
		border: 1px solid #777;
		/*margin-top: 70px;*/
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

	.product-media::before {

		background: linear-gradient(rgba(0, 0, 0, 0) 100%, rgba(0, 0, 0, 0) 90%);
	}

	.banner-part::before {
		background: none !important;
	}

	.banner-content h1 {
		/*color: #0a2540;*/
		color: #000066;
		margin-bottom: 25px;
		text-shadow: none;
	}

	.banner-content p {
		margin-top: 5px;
		text-shadow: none;
		font-size: 12px;
		font-style: italic;
		color: #777;
		line-height: 16px;
		text-align: right;
	}

	.suggest-card {
		margin: 0px 8px;
		border-radius: 8px;
		padding: 28px 0px 21px;
		text-align: center;
		border-left: 1px solid #ddd !important;
		border-right: 1px solid #ddd !important;
		border-top: 1px solid #ddd !important;
		border-bottom: 2px solid #000066;
		background: #dffbff;
	}

	.header-logo img {
		height: 45px !important;
	}

	.details-btn {
		border: 1px solid #0044bb;
		padding: 0px 10px;
		border-radius: 4px;
		background-color: #0044bb;
		color: #ffffff;
	}

	.details-btn:hover {
		background-color: #0022aa;

	}

	.blog-read {
		font-size: 13px;
		font-weight: 500;
	}

	.intro-part {
		padding: 112px 0px 115px;
	}

	.blog-content {
		margin-top: 25px;
		padding: 0px 20px 20px;
	}

	.suggest-part {
		position: relative;
		margin-top: -120px;
		z-index: 2;
	}

	.fa-search-1:before {
		content: "\f002";
		color: #fff;
	}

	input {}

	input,
	input::-webkit-input-placeholder {
		font-size: 17px;
		line-height: 3;
	}

	@media (min-width: 900px) {
		.blog-details-meta li {
			margin-top: 10px;
			border-radius: 25px;
		}

		.banner-part {
			padding: 70px 0px 150px;
		}

		.banner-content {
			margin-bottom: -30px;
		}

	}

	@media (max-width: 767px) {
		.intro-part {
			margin-top: 60px;
			padding: 50px 0px 80px;
		}
	}

	.suggest-contianer {
		position: absolute;
		z-index: 98888;
		left: 10px;
		right: 10px;
		flex: 1;
		background-color: white;
		padding: 5px;
		box-shadow: 1px 1px 1px 1px silver;
		align-items: flex-start;
		justify-content: flex-start;
	}
</style>

<script>
	window.onload = function() {
		getLocation();
	};

	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		}
	}

	function showPosition(position) {
		console.log("Latitude: " + position.coords.latitude +
			"<br>Longitude: " + position.coords.longitude);
	}
</script>
<section itemtype="https://schema.org/School class="banner-part">
	<div class="container">
		<div class="banner-content">

			<!--p>15,000+ Schools | 50,000+ Students | 1,000+ Search Hours</p-->
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<h1 style="text-align: left;">Thousands of learners<span style="font-weight: 400;"> have used School Dekho to find their school.</span></h1>
					<div class="header-search header-search-cover">
						<button type="button" title="Filter by Location" class=""><i class="fas fa-map-marker-alt"></i></i></button>
						<input type="text" id="search_key" placeholder="Search 15000+ schools online" value="">
						<button type="submit" class="btn-primary icon-center" onclick="GoTo()" style="height: 50px; border-radius: 0px 5px 5px 0px; background-color: #000066; color: #fff;" title="Search Submit "><i class="fas fa-search fa-search-1"></i></i></button>
						<script>
							var enter = document.getElementById("search_key");
							enter.addEventListener("keydown", function(e) {
								if (e.code === "Enter") { //checks whether the pressed key is "Enter"
									GoTo();
								}
							});

							function GoTo() {
								var key = document.getElementById("search_key").value;
								console.log(key);
								url = "{{url('search/')}}" + "/" + key;
								console.log(url);
								window.location.href = url;
							}
						</script>
					</div>
					<div id="suggesstion-box" class="suggest-contianer" style="display: none">

					</div>
					<p style="margin-right: 10px;">Powered by SD Search Engine <a href="" style="font:100"> Know more</a></p>

				</div>
			</div>
		</div>
		<div class="row" style="margin-top:35px;">

			<div class="col-lg-8 offset-lg-2">
				<ul class="blog-details-meta">
					@foreach($school_categories as $cat)
					<li><a href="{{url('/search?category='.$cat->id)}}"><i class="fas fa-school"></i>
							<p>{{$cat->category}} Schools</p>
						</a></li>
					@endforeach
					@foreach($school_boards as $data)
					<li><a href="{{url('/search?board='.$data->id)}}"><i class="fas fa-award"></i>
							<p>{{$data->board_name}}</p>
						</a></li>
					@endforeach
					<li><a href="{{url('/search?school_type=Girls')}}"><i class="fas fa-users"></i>
							<p>Girls</p>
						</a></li>
					<li><a href="{{url('/search?school_type=Boys')}}"><i class="fas fa-users"></i>
							<p>Boys</p>
						</a></li>
					<li><a href="{{url('/search?school_type=Coed')}}"><i class="fas fa-users"></i>
							<p>Coed</p>
						</a></li>
				</ul>
			</div>
		</div>
	</div>

</section>

<section class="suggest-part">
	<div class="container">
		<div class="suggest-slider slider-arrow">
			<a href="#" class="suggest-card"><img src="{{asset('assets')}}/images/suggest/admission-open.png" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
				<h6>Admission Open</h6>
				<p>(354) schools</p>
			</a>
			<a href="#" class="suggest-card"><img src="{{asset('assets')}}/images/suggest/schools.png" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
				<h6>Total Schools</h6>
				<p>({{$total_schools}}) schools</p>
			</a>
			<a href="#" class="suggest-card"><img src="{{asset('assets')}}/images/suggest/trending.png" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
				<h6>Trending</h6>
				<p>(212) schools</p>
			</a>
			<a href="#" class="suggest-card"><img src="{{asset('assets')}}/images/suggest/icse.png" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
				<h6>ICSE</h6>
				<p>({{$icse_schools}}) schools</p>
			</a>
			<a href="#" class="suggest-card"><img src="{{asset('assets')}}/images/suggest/cbse.png" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
				<h6>CBSE</h6>
				<p>({{$cbse_schools}}) schools</p>
			</a>
			<a href="#" class="suggest-card"><img src="{{asset('assets')}}/images/suggest/wbbse.png" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
				<h6>WBBSE</h6>
				<p>({{$wbse_schools}}) schools</p>
			</a>
			<a href="#" class="suggest-card"><img src="{{asset('assets')}}/images/suggest/search.png" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
				<h6>Searches</h6>
				<p>(7054) per hour</p>
			</a>
			<a href="#" class="suggest-card"><img src="{{asset('assets')}}/images/suggest/students.png" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
				<h6>Students</h6>
				<p>({{$total_students}}) registered</p>
			</a>
			<a href="#" class="suggest-card"><img src="{{asset('assets')}}/images/suggest/wb.png" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
				<h6>West Bengal</h6>
				<p>(2,112) schools</p>
			</a>

		</div>
	</div>
</section>
<section class="about-part">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="about-content">
					<h2>Who are we and <span style="color: #000066; font-style:italic;">why us?</span></h2>
					<p>Welcome to School Dekho, the India’s first search engine for school admissions. We're dedicated to giving you the best school of your choice with a focus on education as priority, infrastructure & nature like extra-curricular activities, programs, etc.</p>
				</div>
				<div class="about-quote">
					<p>“Education is the most powerful weapon which you can use to change the world.”</p>
					<h5>- <span>Nelson Mandela</span></h5>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row about-image">
					<div class="col-6 col-lg-6"><img src="{{asset('assets')}}/images/about/01.jpg" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></div>
					<div class="col-6 col-lg-6"><img src="{{asset('assets')}}/images/about/02.jpg" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></div>
					<div class="col-6 col-lg-6"><img src="{{asset('assets')}}/images/about/03.jpg" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></div>
					<div class="col-6 col-lg-6"><img src="{{asset('assets')}}/images/about/04.jpg" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></div>
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
					@foreach($recommended_schools as $schools) <div class="product-card">
						<div class="product-media">
							<div class="product-img img-center"><img style="" src="{{$schools->school_logo}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me" height="120"></div>
							<!--div class="cross-vertical-badge product-badge"><i class="fas fa-check-circle"></i><span>Varified</span></div-->

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
							<h5 class="product-title"><a href="ad-details-left.html">{{$schools->name}} <i class="fas fa-check-circle text-primary" title="Verified by School Dekho"></i></a> </h5>
							<div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>{{$schools->address?->address}}</span>

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
<section class="intro-part">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-center-heading">
					<h2>Your Admission Partner!</h2>
					<p>Be a parent or a student or the school itself, we have the solution for everyone. Register to know more.</p><a href="ad-post.html" class="btn btn-outline"><i class="fas fa-plus-circle"></i><span>Register your School</span></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="blog-part">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-center-heading">
					<h2>Read Our <span style="color: #000066; font-style:italic;">Recent Articles</span></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="blog-slider slider-arrow">
					@foreach($popular_blogs as $blog)
					<div class="blog-card">

						<div class="blog-content">
							<a href="#" class="blog-avatar"><img src="{{$blog->image}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
							<ul class="blog-meta">
								<li><i class="fas fa-user"></i>
									<p><a href="#">By School Dekho</a></p>
								</li>
								<li><i class="fas fa-clock"></i>
									<p>{{App\Core\Helper::GetDate($blog->created_at)}}</p>
								</li>
							</ul>
							<div class="blog-text">
								<h4><a href="{{url('school/blog/details/'.$blog->id)}}">{{$blog->title}}</a></h4>
								<p>{!!substr($blog->short_description,0,50)!!}...</p>
							</div><a href="{{url('school/blog/details/'.$blog->id)}}" class="blog-read"><span>read more</span><i class="fas fa-long-arrow-alt-right"></i></a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="blog-btn"><a href="{{route('user.blog.list')}}" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all blogs</span></a></div>
			</div>
		</div>
	</div>
</section>

@endsection

@push('js')
<script>
	$("#search_key").keyup(function() {
		var keyword = $(this).val();
		$.ajax({
			type: "GET",
			url: `/school/search?key=${keyword}`,
			success: function(data) {
				if (keyword.length > 0) {
					$("#suggesstion-box").show();
					$("#suggesstion-box").html(data);
					$("#search-box").css("background", "#FFF");
				} else {
					$("#suggesstion-box").hide();
				}
			}
		});
	})
</script>
@endpush