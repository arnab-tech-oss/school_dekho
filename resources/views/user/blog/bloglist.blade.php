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
        Blogs | School Dekho | Best School near me | Indias first school search portal | Dekho Phir Chuno
    </title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/font-awesome/fontawesome.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/main.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/dashboard.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/index.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/slick.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom/blog-list.css">
</head>

<body>
    @include('layouts.frontend.partials.header')
    @include('layouts.frontend.partials.sidebar')
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
    <!--section class="single-banner dashboard-banner">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single-content">
						<!--h2>dashboard</h2>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">dashboard</li>
						</ol->
					</div>
				</div>
			</div>
		</div>
	</section-->

    <section class="blog-part">
        <div class="container">
            <div class="row content-reverse">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-sidebar">
                                <div class="blog-sidebar-title">
                                    <h5>Search</h5>
                                </div>
                                <form class="blog-src">
                                    <input type="text" placeholder="Search...">
                                    <button><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 m-auto">
                            <div class="blog-sidebar">
                                <div class="blog-sidebar-title">
                                    <h5>popular post</h5>
                                </div>
                                <ul class="blog-suggest">
                                    @foreach($popular_blogs as $blog)
                                    <li>
                                        <div class="suggest-img">
                                            <a href="#"><img src="{{$blog->image}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                                        
                                        </div>
                                        <div class="suggest-content">
                                            <div class="suggest-title">
                                                <h4><a href="{{url('school/blog/details/'.$blog->id)}}">{{$blog->title}}</a></h4>
                                            </div>
                                            <div class="suggest-meta">
                                                <div class="suggest-date"><i class="far fa-calendar-alt"></i>
                                                    <p>{{App\Core\Helper::GetDate($blog->created_at)}}</p>
                                                </div>
                                                <div class="suggest-comment"><i class="far fa-comments"></i>
                                                    <p>{{sizeof($blog->comment)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 m-auto">
                            <div class="blog-sidebar">
                                <div class="blog-sidebar-title">
                                    <h5>Top categories</h5>
                                </div>
                                <ul class="blog-cate">
                                    @foreach($blogcategories as $blogcategory)
                                    <li>
                                        <h5><a href="#">{{$blogcategory->name}}</a></h5>
                                        <p>{{sizeof($blogcategory->blog_categories)}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 m-auto">
                            <div class="blog-sidebar">
                                <div class="blog-sidebar-title">
                                    <h5>Best tags</h5>
                                </div>
                                <ul class="blog-tag">
                                    @foreach($blogtags as $tag)
                                    <li><a href="#">{{$tag->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 m-auto">
                            <div class="blog-sidebar">
                                <div class="blog-sidebar-title">
                                    <h5>follow us</h5>
                                </div>
                                <ul class="blog-icon">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-sm-10 col-md-6 col-lg-6 m-auto">
                            <div class="blog-card">
                                <div class="blog-img"><img src="{{$blog->image}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                                    <div class="blog-overlay"><span class="marketing">Marketing</span></div>
                                </div>
                                <div class="blog-content">
                                    <a href="#" class="blog-avatar"><img src="{{$blog->image}}" alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                                    <ul class="blog-meta">
                                        <li><i class="fas fa-user"></i>
                                            <p><a href="#">{{$blog->user->name}}</a></p>
                                        </li>
                                        <li><i class="fas fa-clock"></i>
                                            <p>{{App\Core\Helper::GetDate($blog->created_at)}}</p>
                                        </li>
                                    </ul>
                                    <div class="blog-text">
                                        <h4><a href="{{url('school/blog/details/'.$blog->id)}}">{{$blog->title}}</a></h4>
                                        <p>{!!substr($blog->short_description,0,4)!!}...</p>
                                    </div><a href="{{url('school/blog/details/'.$blog->id)}}" class="blog-read"><span>read more</span><i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="pagination">
                                <!-- <li class="page-item"><a class="page-link" href="#"><i class="fas fa-long-arrow-alt-left"></i></a></li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">...</li>
                                <li class="page-item"><a class="page-link" href="#">67</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a></li> -->
                                {{ $blogs->links()  }}
                            </ul>
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
    <script src="{{asset('assets')}}/js/custom/main.js"></script>
    <script src="{{asset('assets')}}/js/vendor/slick.min.js"></script>
    <script src="{{asset('assets')}}/js/custom/slick.js"></script>
</body>


</html>