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
        {{ $blogdetails->title }} | School Dekho | Best School near me | Indias first school search portal | Dekho Phir
        Chuno
    </title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/font-awesome/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/custom/main.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/custom/dashboard.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/custom/index.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor/slick.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/custom/blog-details.css">
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

    <section class="blog-details-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="blog-details-title">
                        <h2><a href="#">{{ $blogdetails->title }}</a></h2>
                    </div>
                    <ul class="blog-details-meta">
                        <li><a href="#"><i class="far fa-user"></i>
                                <p>{{ $blogdetails->user->name }}</p>
                            </a></li>
                        <li><a href="#"><i class="far fa-calendar-alt"></i>
                                <p>{{ App\Core\Helper::GetDate($blogdetails->created_at) }}</p>
                            </a></li>

                        <li><a href="#"><i class="far fa-comments"></i>
                                <p>{{ sizeof($blog_comments) }} Comment</p>
                            </a></li>
                        <!-- <li><a href="#"><i class="far fa-share-square"></i>
                                <p>21 Share</p>
                            </a></li> -->
                    </ul>
                    <div class="blog-details-image"><img src="{{ $blogdetails->image }}"
                            alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me">
                    </div>

                    <div class="blog-details-content">
                        {!! $blogdetails->blog_description !!}
                    </div>

                    <div class="blog-details-widget">
                        <ul class="tag-list">
                            <li>
                                <h4>Tags:</h4>
                            </li>
                            @foreach ($blogtags as $tag)
                                <li><a href="#">{{ $tag->blog_tag->name }}</a></li>
                            @endforeach
                        </ul>
                        <ul class="share-list">
                            <li>
                                <h4>Share:</h4>
                            </li>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            {{-- <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li> --}}
                        </ul>
                    </div>

                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-md-6 col-lg-6">
                                <div class="blog-card">
                                    <div class="blog-img"><img src="{{ $blog->image }}"
                                            alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"
                                            height="160" width="80">
                                        <div class="blog-overlay"><span class="advertise">advertise</span></div>
                                    </div>
                                    <div class="blog-content">
                                        <a href="#" class="blog-avatar"><img src="{{ $blog->image }}"
                                                alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                                        <ul class="blog-meta">
                                            <li><i class="fas fa-user"></i>
                                                <p><a href="#">{{ $blog->user->name }}</a></p>
                                            </li>
                                            <li><i class="fas fa-clock"></i>
                                                <p>02 Feb 2021</p>
                                            </li>
                                        </ul>
                                        <div class="blog-text">
                                            <h4><a href="#">{{ $blog->title }}</a></h4>
                                            <p>{!! $blogdetails->blog_description !!}</p>
                                        </div><a href="{{ url('school/blog/details/' . $blog->id) }}"
                                            class="blog-read"><span>read more</span><i
                                                class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12">
                            <div class="blog-details-navigate">
                                @if ($previous_blog_id)
                                    <a href="{{ url('school/blog/details/' . $previous_blog_id) }}"><i
                                            class="fas fa-long-arrow-alt-left"></i><span>Previous Post</span></a>
                                @endif
                                @if ($next_blog_id)
                                    <a href="{{ url('school/blog/details/' . $next_blog_id) }}"><span>Next Post</span><i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="blog-details-comment">
                        <div class="comment-title">
                            <h3>Comments ({{ sizeof($blog_comments) }})</h3>
                        </div>
                        <ul class="comment-list">
                            @foreach ($blog_comments as $comment)
                                <li>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#"><img src="images/avatar/03.jpg"
                                                    alt="School Dekho, India's first search engine for school admissions, Dekho Phir Chuno, best school near me"></a>
                                            <button class="btn btn-inline"><i
                                                    class="fas fa-reply-all"></i><span>reply</span></button>
                                        </div>
                                        <div class="comment-content">
                                            <h4><a
                                                    href="#">{{ $comment->name }}</a><span>{{ App\Core\Helper::GetDate($comment->created_at) }}</span>
                                            </h4>
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="blog-details-form">
                        <div class="form-title">
                            <h3>Leave Your Comment</h3>
                        </div>
                        <form action="{{ route('blog.comment.new') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name"
                                            required="required" placeholder="Your Name">
                                        <input type="hidden" name="blog_id" value="{{ $blogdetails->id }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"
                                            required="required" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control" required="required" name="comment" placeholder="Your Comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-btn">
                                        <button type="submit" class="btn btn-inline"><i
                                                class="fas fa-tint"></i><span>Drop your comment</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <script src="{{ asset('assets') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/custom/main.js"></script>
    <script src="{{ asset('assets') }}/js/vendor/slick.min.js"></script>
    <script src="{{ asset('assets') }}/js/custom/slick.js"></script>
</body>

</html>
