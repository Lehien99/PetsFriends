@extends('index')

@section('contents')
    <section class="main-content mt-3">
        <div class="container-xl">
           
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">search</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Result for: {{$article_count}}</li>
                </ol>
            </nav>
            <div class="row gy-4">
                <div class="col-lg-8">

                    <div class="row gy-4">
                        @foreach($article as $art)
                        <div class="col-sm-6">
                            <!-- post -->
                            <div class="post post-grid rounded bordered">
                                <div class="thumb top-rounded">
                                    <a href="category.html" class="category-badge position-absolute">{{$art->category->Name}}</a>
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="{{ route('article.detail', ['article' => $art]) }}">
                                        <div class="inner">
                                            <img src="upload/article/{{ $art->Image }}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png"
                                                    class="author" alt="author" />{{ $art->IsPublisher }}</a></li>
                                        <li class="list-inline-item">{{ $art->created_at->format(' d M Y ') }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a  href="user/article/detail/{{ $art->id }}">{{ $art->Title }}</a></h5>
                                    <p class="excerpt mb-0">{{ $art->Summary}}</p>
                                </div>
                                <div class="post-bottom clearfix d-flex align-items-center">
                                    <div class="social-share me-auto">
                                        <button class="toggle-button icon-share"></button>
                                        <ul class="icons list-unstyled list-inline mb-0">
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i
                                                        class="fab fa-telegram-plane"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="more-button float-end">
                                        <a href="blog-single.html"><span class="icon-options"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">1</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul>
                    </nav>

                </div>
                <div class="col-lg-4">
                    <!-- sidebar -->
                    @include('layouts.sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
