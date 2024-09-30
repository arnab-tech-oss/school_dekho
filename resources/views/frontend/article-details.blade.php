@extends('layouts.frontend.app')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/css/custom/articleDetails.css') }}">
@endpush
@section('content')
 
<div class="blog-section section-padding-01">
    <div class="container custom-container">
        <div class="page-breadcrumb mb-1">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('schools.index')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('article.list')}}">Article</a></li>
                <li class="breadcrumb-item active">{{ $article_details->blog_title }}</li>
            </ul>
        </div>
        <div class="row gy-10 ">
            <div class="col-lg-8">

                <!-- Blog Dtails Start -->
                <article class="article">

                    <div class="blog-details__image">
                        <div class="image-wrapper"><img src="{{ $blog_image_path }}"
                                alt="{{ $article_details->blog_title }}"></div>
                        {{-- <div class="blog-details__categories">
                            <a href="#">Video & Tips</a>
                        </div> --}}
                    </div>

                    <div class="blog-details__content">
                        <div class="blog-details__meta">
                            <a class="meta-action"
                                href="{{ route('article.authorwise.list', $article_details->blog_article_writer->slug) }}">

                                <span class="meta-action__value"><i class="far fa-user"></i> Written By {{
                                    $article_details->blog_article_writer->writer_name }}</span>
                            </a>
                            <span class="meta-action"><i class="far fa-calendar"></i> <span
                                    class="meta-action__value">{{ $article_details->created_at->format('F j, Y')
                                    }}</span></span>

                            </a>
                        </div>
                        <h1 class="blog-details__title title-h1">{{
                            $article_details->blog_title }}
                        </h1>
                        <div class="article-content">{!! $article_details->blog_content !!}</div>

                    </div>

                    <div class="blog-details__nav">
                        @if ($previous_article_details)
                        <div class="blog-details__nav-item prev">
                            <a class="blog-details__nav-link"
                                href="{{ route('article.details', $previous_article_details->custom_url) }}">
                                <div class="blog-details__hover-bg"
                                    style="background-image: url(assets/images/blog/blog-11.jpg);"></div>
                                <span class="text">{{ $previous_article_details->blog_title }}</span>
                            </a>
                        </div>
                        @endif
                        @if ($next_article_details)
                        <div class="blog-details__nav-item next">
                            <a class="blog-details__nav-link"
                                href="{{ route('article.details', $next_article_details->custom_url) }}">
                                <div class="blog-details__hover-bg"
                                    style="background-image: url(assets/images/blog/blog-13.jpg);"></div>
                                <span class="text">{{ $next_article_details->blog_title }}</span>
                            </a>
                        </div>
                        @endif
                    </div>

                </article>

            </div>
            <div class="col-lg-4">
                <!-- Sidebar Widget Start -->
                <div class="sidebar-widget-weap-02 ps-xl-6">

                    <!-- Sidebar Widget Start -->
                    <div class="sidebar-widget-02">
                        <h4 class="sidebar-widget-02__title">Search</h4>

                        <!-- Sidebar Widget Search Start -->
                        <div class="sidebar-widget-02-search">
                            <form method="get" action="#">
                                <input type="search" class="sidebar-widget-02-search__field" placeholder="Search…">
                                <button type="submit" class="sidebar-widget-02-search__submit">
                                    <span class="search-btn-icon fas fa-search"></span>
                                </button>
                            </form>
                        </div>
                        <!-- Sidebar Widget Search End -->
                    </div>
                    <!-- Sidebar Widget End -->

                    <!-- Sidebar Widget Start -->
                    <div class="sidebar-widget-02">
                        <h4 class="sidebar-widget-02__title">Categories</h4>

                        <!-- Sidebar Widget Search Start -->
                        <ul class="sidebar-widget-02__link">
                            @foreach ($article_all_categories as $category)
                            <li><a href="{{ route('article.category.list', $category->slug) }}">{{
                                    $category->category_name }}
                                    <span class="count">({{ $category?->article_count }})</span> </a></li>
                            @endforeach
                        </ul>
                        <!-- Sidebar Widget Search End -->
                    </div>
                    <!-- Sidebar Widget End -->

                    <!-- Sidebar Widget Start -->
                    <div class="sidebar-widget-02">
                        <h4 class="sidebar-widget-02__title">Latest Posts</h4>

                        <!-- Sidebar Widget Search Start -->
                        <ul class="sidebar-widget-02__psot">
                            @foreach ($latest_articles as $article)
                            <li>
                                <div class="sidebar-widget-02__psot-item">
                                    <div class="sidebar-widget-02__psot-thumbnail ">
                                        <a href="{{ route('article.details', $article->custom_url) }}">
                                            <img src="{{ asset('/storage/articlebanner/'.$article->blog_image_path) }}"
                                                alt="Blog" width="100" height="80">

                                        </a>
                                    </div>
                                    <div class="sidebar-widget-02__psot-info">
                                        <h5 class="sidebar-widget-02__psot-title"><a
                                                href="{{ route('article.details', $article->custom_url) }}">{{
                                                $article->blog_title }}</a>
                                        </h5>
                                        <span class="sidebar-widget-02__psot-date">{{ $article->created_at->format('F j,
                                            Y') }}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <!-- Sidebar Widget Search End -->
                    </div>
                    <!-- Sidebar Widget End -->

                    <!-- Sidebar Widget Start -->
                    {{-- <div class="sidebar-widget-02">
                        <h4 class="sidebar-widget-02__title">Popular Tags</h4>

                        <!-- Sidebar Widget Search Start -->
                        <ul class="sidebar-widget-02__tags">
                            <li><a href="#">data science</a></li>
                            <li><a href="#">deep learning</a></li>
                            <li><a href="#">education</a></li>
                            <li><a href="#">language</a></li>
                            <li><a href="#">learning</a></li>
                            <li><a href="#">machine learning</a></li>
                            <li><a href="#">tips</a></li>
                            <li><a href="#">videos</a></li>
                            <li><a href="#">web development</a></li>
                        </ul>
                        <!-- Sidebar Widget Search End -->
                    </div> --}}
                    <!-- Sidebar Widget End -->

                </div>
                <!-- Sidebar Widget End -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() { addParentToTables(); }); const article = document.querySelector('.article-content'); if (article) { const elements = article.querySelectorAll('*'); elements.forEach(element => { element.removeAttribute('style'); element.removeAttribute('class'); }); } function addParentToTables() { const tables = document.querySelectorAll('table'); tables.forEach(table => { const parentElement = document.createElement('div'); parentElement.className = 'table-responsive'; table.parentNode.insertBefore(parentElement, table); parentElement.appendChild(table); }); } 
</script>
@endpush