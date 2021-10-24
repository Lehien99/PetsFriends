@extends('index')

@section('contents')
    <!-- hero section -->
    <section id="hero">

        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">

                    <!-- featured post large -->
                    @foreach ($article as $art)
                        <div class="post featured-post-lg">
                            <div class="details clearfix">
                                <a href="/category/{{$art->category->id}}" class="category-badge">{{ $art->category->Name }}</a>
                                <h2 class="post-title"><a
                                        href="user/article/detail/{{ $art->id }}">{{ $art->Title }}</a></h2>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">{{ $art->IsPublisher }}</a></li>
                                    <li class="list-inline-item">{{ $art->created_at->format(' d M Y ') }}</li>
                                </ul>
                            </div>
                            {{-- <a href="user/article/detail/{{$art->id}}"> --}}
                            <a href="{{ route('article.detail', ['article' => $art]) }}">
                                <div class="thumb rounded">
                                    <div class="inner data-bg-image" data-bg-image="upload/article/{{ $art->Image }}">
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>

                <div class="col-lg-4">

                    <!-- post tabs -->
                    <div class="post-tabs rounded bordered">
                        <!-- tab navs -->
                        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                            <li class="nav-item" role="presentation"><button aria-controls="popular"
                                    aria-selected="true" class="nav-link active" data-bs-target="#popular"
                                    data-bs-toggle="tab" id="popular-tab" role="tab"
                                    type="button">{{ 'Popular' }}</button></li>
                            <li class="nav-item" role="presentation"><button aria-controls="recent"
                                    aria-selected="false" class="nav-link" data-bs-target="#recent"
                                    data-bs-toggle="tab" id="recent-tab" role="tab"
                                    type="button">{{ 'Recent' }}</button></li>
                        </ul>
                        <!-- tab contents -->
                        <div class="tab-content" id="postsTabContent">
                            <!-- loader -->
                            <div class="lds-dual-ring"></div>
                            <!-- popular posts -->
                            <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular"
                                role="tabpanel">
                                <!-- post -->
                                @foreach ($popular as $populars)
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <a href="{{ route('article.detail', ['article' => $populars]) }}">
                                                <div class="inner">
                                                    <img src="upload/article/{{ $populars->Image }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a
                                                    href="{{ route('article.detail', ['article' => $populars]) }}">{{ $populars->Title }}</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">{{ $populars->created_at->format('d M Y') }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- recent posts -->
                            <div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
                                <!-- post -->
                                @foreach ($recent as $recents)
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <a href="{{ route('article.detail', ['article' => $recents]) }}">
                                                <div class="inner">
                                                    <img src="upload/article/{{ $recents->Image }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a
                                                    href="{{ route('article.detail', ['article' => $recents]) }}">{{ $recents->Title }}</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">
                                                    {{ $recents->created_at->format(' d M Y ') }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- section main content -->
    <section class="main-content">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">{{ 'Editor’s Pick' }}</h3>
                        <img src="user_asset/images/wave.svg" class="wave" alt="wave" />
                    </div>

                    <div class="padding-30 rounded bordered">
                        <div class="row gy-5">

                            <div class="col-sm-6">
                                <!-- post -->
                                @foreach ($editorPick1 as $Picks)
                                    <div class="post">
                                        <div class="thumb rounded">
                                            <a href="/category/{{ $Picks->category->id}}"
                                                class="category-badge position-absolute">{{ $Picks->category->Name }}</a>
                                            <span class="post-format">
                                                <i class="icon-picture"></i>
                                            </span>
                                            <a href="{{ route('article.detail', ['article' => $Picks]) }}">
                                                <div class="inner">
                                                    <img src="upload/article/{{ $Picks->Image }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <ul class="meta list-inline mt-4 mb-0">
                                            <li class="list-inline-item"><a href="#"><img
                                                        src="upload/avatar/{{ $Picks->user->avatar }}"
                                                        style="border-radius: 50%; width:30px; height:30px"
                                                        class="author"
                                                        alt="author" />{{ $Picks->IsPublisher }}</a>
                                            </li>
                                            <li class="list-inline-item">{{ $Picks->created_at->format('d M Y') }}</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3"><a
                                                href="{{ route('article.detail', ['article' => $Picks]) }}">{{ $Picks->Title }}</a>
                                        </h5>
                                        <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire
                                            soul,
                                            like these sweet mornings of spring which I enjoy</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-sm-6">
                                <!-- post -->
                                @foreach ($editorPick as $editorPicks)
                                    <div class="post post-list-sm square">
                                        <div class="thumb rounded">
                                            <a href="{{ route('article.detail', ['article' => $editorPicks]) }}">
                                                <div class="inner">
                                                    <img src="upload/article/{{ $editorPicks->Image }}"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a
                                                    href="{{ route('article.detail', ['article' => $editorPicks]) }}">{{ $editorPicks->Title }}</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">
                                                    {{ $editorPicks->created_at->format('d M Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- horizontal ads -->
                    <!-- <div class="ads-horizontal text-md-center">
                              <span class="ads-title">- Sponsored Ad -</span>
                              <a href="#">
                               <img src="images/ads/ad-750.png" alt="Advertisement" />
                              </a>
                             </div> -->

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">{{ 'Trending' }}</h3>
                        <img src="user_asset/images/wave.svg" class="wave" alt="wave" />
                    </div>

                    <div class="padding-30 rounded bordered">
                        <div class="row gy-5">
                            <div class="col-sm-6">
                                <!-- post large -->
                                @foreach ($trending1 as $trendings)
                                    <div class="post">
                                        <div class="thumb rounded">
                                            <a href="/category/{{ $trendings->category->id}}" class="category-badge position-absolute">{{$trendings->category->Name}}</a>
                                            <span class="post-format">
                                                <i class="icon-picture"></i>
                                            </span>
                                            <a href="{{ route('article.detail', ['article' => $trendings]) }}">
                                                <div class="inner">
                                                    <img src="upload/article/{{ $trendings->Image }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <ul class="meta list-inline mt-4 mb-0">
                                            <li class="list-inline-item"><a href="#"><img
                                                        src="upload/avatar/{{ $trendings->user->avatar }}"
                                                        style="border-radius: 50%; width:30px; height:30px"
                                                        class="author"
                                                        alt="author" />{{ $trendings->IsPublisher }}</a></li>
                                            <li class="list-inline-item">{{ $trendings->created_at->format(' d M Y ') }}
                                            </li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3"><a
                                                href="{{ route('article.detail', ['article' => $trendings]) }}">{{ $trendings->Title }}</a>
                                        </h5>
                                        <p class="excerpt mb-0">{{ $trendings->Summary }}</p>
                                    </div>
                                @endforeach
                                <!-- post -->
                                @foreach ($trending as $trendings)
                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="{{ route('article.detail', ['article' => $trendings]) }}">
                                                <div class="inner">
                                                    <img src="upload/article/{{ $trendings->Image }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a
                                                    href="{{ route('article.detail', ['article' => $trendings]) }}">{{ $trendings->Title }}</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">
                                                    {{ $trendings->created_at->format(' d M Y ') }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-sm-6">
                                <!-- post large -->
                                @foreach ($trending2 as $trendings)
                                    <div class="post">
                                        <div class="thumb rounded">
                                            <a href="/category/{{ $trendings->category->id}}" class="category-badge position-absolute">{{$trendings->category->Name}}</a>
                                            <span class="post-format">
                                                <i class="icon-earphones"></i>
                                            </span>
                                            <a href="{{ route('article.detail', ['article' => $trendings]) }}">
                                                <div class="inner">
                                                    <img src="upload/article/{{ $trendings->Image }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <ul class="meta list-inline mt-4 mb-0">
                                            <li class="list-inline-item"><a href="#"><img
                                                        src="upload/avatar/{{ $trendings->user->avatar }}"
                                                        style="border-radius: 50%; width:30px; height:30px"
                                                        class="author"
                                                        alt="author" />{{ $trendings->IsPublisher }}</a></li>
                                            <li class="list-inline-item">{{ $trendings->created_at->format(' d M Y ') }}
                                            </li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3"><a
                                                href="{{ route('article.detail', ['article' => $trendings]) }}">{{ $trendings->Title }}</a>
                                        </h5>
                                        <p class="excerpt mb-0">{{ $trendings->Summary }}</p>
                                    </div>
                                @endforeach
                                <!-- post -->
                                @foreach ($trending3 as $trendings)
                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="{{ route('article.detail', ['article' => $trendings]) }}">
                                                <div class="inner">
                                                    <img src="upload/article/{{ $trendings->Image }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a
                                                    href="{{ route('article.detail', ['article' => $trendings]) }}">{{ $trendings->Title }}</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">
                                                    {{ $trendings->created_at->format(' d M Y ') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    {{-- <div class="section-header">
                        <h3 class="section-title">Inspiration</h3>
                        <img src="user_asset/images/wave.svg" class="wave" alt="wave" />
                        <div class="slick-arrows-top">
                            <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons"
                                aria-label="Previous"><i class="icon-arrow-left"></i></button>
                            <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons"
                                aria-label="Next"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="row post-carousel-twoCol post-carousel">
                        <!-- post -->
                        <div class="post post-over-content col-md-6">
                            <div class="details clearfix">
                                <a href="category.html" class="category-badge">Inspiration</a>
                                <h4 class="post-title"><a href="blog-single.html"></a></h4>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                    <li class="list-inline-item">29 March 2021</li>
                                </ul>
                            </div>
                            <a href="blog-single.html">
                                <div class="thumb rounded">
                                    <div class="inner">
                                        <img src="user_asset/images/posts/inspiration-1.jpg" alt="thumb" />
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- post -->
                        <div class="post post-over-content col-md-6">
                            <div class="details clearfix">
                                <a href="category.html" class="category-badge">Inspiration</a>
                                <h4 class="post-title"><a href="blog-single.html">Feel Like A Pro With The Help Of
                                        These 7 Tips</a></h4>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                    <li class="list-inline-item">29 March 2021</li>
                                </ul>
                            </div>
                            <a href="blog-single.html">
                                <div class="thumb rounded">
                                    <div class="inner">
                                        <img src="user_asset/images/posts/inspiration-2.jpg" alt="thumb" />
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- post -->
                        <div class="post post-over-content col-md-6">
                            <div class="details clearfix">
                                <a href="category.html" class="category-badge">Inspiration</a>
                                <h4 class="post-title"><a href="blog-single.html">Your Light Is About To Stop Being
                                        Relevant</a></h4>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                    <li class="list-inline-item">29 March 2021</li>
                                </ul>
                            </div>
                            <a href="blog-single.html">
                                <div class="thumb rounded">
                                    <div class="inner">
                                        <img src="user_asset/images/posts/inspiration-3.jpg" alt="thumb" />
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Latest Posts</h3>
                        <img src="user_asset/images/wave.svg" class="wave" alt="wave" />
                    </div>

                    <div class="padding-30 rounded bordered">

                        <div class="row">
                            @foreach ($recent as $recents)
                                <div class="col-md-12 col-sm-6">
                                    <!-- post -->
                                    <div class="post post-list clearfix">
                                        <div class="thumb rounded">
                                            <span class="post-format-sm">
                                                <i class="icon-picture"></i>
                                            </span>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="upload/article/{{ $recents->Image }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-3">
                                                <li class="list-inline-item"><a href="#"><img
                                                            src="user_asset/images/other/author-sm.png"
                                                            class="author"
                                                            alt="author" />{{ $recents->IsPublisher }}</a></li>
                                                <li class="list-inline-item"><a
                                                        href="#">{{ $recents->category->Name }}</a></li>
                                                <li class="list-inline-item">
                                                    {{ $recents->created_at->format(' d M Y ') }}</li>
                                            </ul>
                                            <h5 class="post-title"><a
                                                    href="blog-single.html">{{ $recents->Title }}</a></h5>
                                            <p class="excerpt mb-0">{{ $recents->Summary }}</p>
                                            <div class="post-bottom clearfix d-flex align-items-center">
                                                <div class="social-share me-auto">
                                                    <button class="toggle-button icon-share"></button>
                                                    <ul class="icons list-unstyled list-inline mb-0">
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-twitter"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-linkedin-in"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-pinterest"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-telegram-plane"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="far fa-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="more-button float-end">
                                                    <a href="blog-single.html"><span class="icon-options"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!-- load more button -->
                        <div class="text-center">
                            <button class="btn btn-simple">Load More</button>
                        </div>

                    </div>

                </div>
                <div class="col-lg-4">
                    <!-- sidebar -->
                    @include('layouts.sidebar')
                </div>
            </div>

        </div>
    </section>
    <div class="layouts_insta">
        @include('layouts.insta')
    </div>
    @include('layouts.footer')

@endsection
