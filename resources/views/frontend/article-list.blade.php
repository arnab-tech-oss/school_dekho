@extends('layouts.frontend.app') @push('css') <style>
    .sidebar-widget-02__tags li {
        margin-right: 0;
    }

    .sidebar-widget-02__tags {
        gap: 5px;
    }
</style> @endpush @section('content') <div class="page-banner bg-color-05 ">
    <div class="page-banner__wrapper">
        <div class="container">
            <!-- Page Breadcrumb Start -->
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Articles</li>
                </ul>
            </div> <!-- Page Breadcrumb End -->
            <!-- Page Banner Caption Start -->
            <div class="page-banner__caption text-center">
                @if(isset($category_name))
                <h2 class="page-banner__main-title">{{$category_name}}</h2>                    
                @else
                    <h2 class="page-banner__main-title">Article</h2>
                @endif
            </div> <!-- Page Banner Caption End -->
        </div>
    </div>
</div>
<div class="blog-section section-padding-01">
    <div class="container custom-container">
        <div class="row gy-10">
            <div class="col-lg-8">
                <!-- Blog Item Start -->
                <div class="blog-list-items"> 
                    <!-- Blog Item Start --> @foreach($all_blogs as $blog) <div class="blog-list-item-02"
                        data-aos="fade-up" data-aos-duration="1000">
                        <div class="blog-list-item-02__image"> <a href="{{route('article.details',$blog->custom_url)}}">
                                <img src="{{asset('/storage/articlebanner/'.$blog->blog_image_path)}}" alt="Blog"
                                width="270" height="170"></a> </div>
                        <div class="blog-list-item-02__content">
                            <h3 class="blog-list-item-02__title"><a
                                    href="{{route('article.details',$blog->custom_url)}}">{{ $blog->blog_title }}</a>
                            </h3>
                            <div class="blog-list-item-02__meta"> <span class="meta-action"> <i
                                        class="far fa-calendar"></i> {{ $blog->created_at->format('d M Y') }}</span>
                                <span class="meta-action"> <i class="fal fa-user"></i><a
                                        href="{{route('article.authorwise.list',$blog->blog_article_writer->slug)}}">{{$blog->blog_article_writer->writer_name}}</a></span>
                            </div> <a class="blog-list-item-02__more"
                                href="{{route('article.details',$blog->custom_url)}}">Read More <i
                                    class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div> @endforeach
                    <!-- Blog Item End -->
                </div> <!-- Blog Item End -->
                <!-- Page Pagination Start -->
                <div class="page-pagination">
                    <ul class="pagination justify-content-center"> {{ $all_blogs->links() }} </ul>
                </div> <!-- Page Pagination End -->
            </div>
            <div class="col-lg-4">
                <!-- Sidebar Widget Start -->
                <div class="sidebar-widget-weap-02 ps-xl-6">
                    <!-- Sidebar Widget Start -->
                    <div class="sidebar-widget-02"> {{-- <h4 class="sidebar-widget-02__title">Search</h4> --}}
                        <!-- Sidebar Widget Search Start --> {{-- <div class="sidebar-widget-02-search">
                            <form method="get" action="#"> <input type="search" class="sidebar-widget-02-search__field"
                                    placeholder="Search…"> <button type="submit"
                                    class="sidebar-widget-02-search__submit"> <span
                                        class="search-btn-icon fas fa-search"></span> </button> </form>
                        </div> --}}
                        <!-- Sidebar Widget Search End -->
                    </div> <!-- Sidebar Widget End -->
                    <!-- Sidebar Widget Start -->
                    <div class="sidebar-widget-02">
                        <h4 class="sidebar-widget-02__title">Categories</h4> <!-- Sidebar Widget Search Start -->
                        <ul class="sidebar-widget-02__link"> @foreach($article_all_categories as $category) <li><a
                                    href="{{route('article.category.list',$category->slug)}}">{{$category->category_name}}
                                    <span class="count">({{$category->article_count}})</span> </a></li> @endforeach
                        </ul> <!-- Sidebar Widget Search End -->
                    </div> <!-- Sidebar Widget End -->
                    <!-- Sidebar Widget Start -->
                    <div class="sidebar-widget-02">
                        <h4 class="sidebar-widget-02__title">Latest Posts</h4> <!-- Sidebar Widget Search Start -->
                        <ul class="sidebar-widget-02__psot"> @foreach($latest_articles as $article) <li>
                                <div class="sidebar-widget-02__psot-item">
                                    <div class="sidebar-widget-02__psot-thumbnail "> {{-- <a
                                            href="blog-details-right-sidebar.html"> <img
                                                src="assets/images/blog/blog-16.jpg" alt="Blog" width="100" height="80">
                                        </a> --}} </div>
                                    <div class="sidebar-widget-02__psot-info">
                                        <h5 class="sidebar-widget-02__psot-title"><a
                                                href="{{route('article.details',$article->custom_url)}}">{{$article->blog_title}}</a>
                                        </h5> <span
                                            class="sidebar-widget-02__psot-date">{{$article->created_at->format('d M
                                            Y')}}</span>
                                    </div>
                                </div>
                            </li> @endforeach </ul> <!-- Sidebar Widget Search End -->
                    </div> <!-- Sidebar Widget End -->
                    <!-- Sidebar Widget Start -->
                    <!-- Sidebar Widget End -->
                </div> <!-- Sidebar Widget End -->
            </div>
        </div>
    </div>
</div> @endsection @push('js') @endpush