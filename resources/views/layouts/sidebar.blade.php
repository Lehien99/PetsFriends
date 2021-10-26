<div class="sidebar">
    <!-- widget about -->
    @guest
    <div class="widget rounded">
        <div class="widget-about data-bg-image text-center" data-bg-image="user_asset/images/map-bg.png">
            <img src="upload/avatar/defaut.png" style="border-radius: 50%; width:100px; height:100px" alt="logo" class="mb-4" />
            <p class="mb-4">Welcome to the PetsFriend blog..</p>
            <ul class="social-icons list-unstyled list-inline mb-0">
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
    </div> 
    @else
    <div class="widget rounded">
        <div class="widget-about data-bg-image text-center">
            <img src="upload/avatar/{{Auth::user()->avatar}}" style="border-radius: 50%; width:100px; height:100px" alt="logo" class="mb-4" />
            <p class="mb-4"> {{'Hello '.Auth::user()->name}}, Welcome to the PetsFriend blog.</p>
            <ul class="social-icons list-unstyled list-inline mb-0">
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
    </div> 
  
    @endguest

    <!-- widget popular posts -->
    <div class="widget rounded">
        <div class="widget-header text-center">
            <h3 class="widget-title">{{'Popular Posts'}}</h3>
            <img src="user_asset/images/wave.svg" class="wave" alt="wave" />
        </div>
        <div class="widget-content">
            <!-- post -->
            @foreach ($popular as $populars)
            <div class="post post-list-sm circle">
                <div class="thumb circle">
                    <span class="number">{{$populars ->id}}</span>
                    <a href="{{ route('article.detail', ['article' =>$populars]) }}">
                        <div class="inner">
                            <img src="upload/article/{{ $populars->Image }}" alt="post-title" />
                        </div>
                    </a>
                </div>
                <div class="details clearfix">
                    <h6 class="post-title my-0"><a href="{{ route('article.detail', ['article' =>$populars]) }}">{{ $populars->Title }}</a>
                    </h6>
                    <ul class="meta list-inline mt-1 mb-0">
                        <li class="list-inline-item">{{ $populars->created_at->format('d M Y') }}</li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- widget categories -->
    <div class="widget rounded">

        <div class="widget-header text-center">
            <h3 class="widget-title">{{ 'Explore Category' }}</h3>
            <img src="user_asset/images/wave.svg" class="wave" alt="wave" />
        </div>
        @foreach ($category as $cate)
            <div class="widget-content">
                <ul class="list">
                    <li><a href="/category/{{$cate->id}}">{{ $cate->Name }}</a><span>{{ $cate->article_count }}</span></li>
                </ul>
            </div>
        @endforeach

    </div>
    <!-- widget post carousel -->
    <div class="widget rounded">
        <div class="widget-header text-center">
            <h3 class="widget-title">Celebration</h3>
            <img src="user_asset/images/wave.svg" class="wave" alt="wave" />
        </div>
        <div class="widget-content">
            <div class="post-carousel-widget">
                <!-- post -->
                @foreach ($recent as $recents)
                <div class="post post-carousel">
                    <div class="thumb rounded">
                        <a href="/category/{{ $recents->category->id}}" class="category-badge position-absolute">{{$recents->category->Name}}</a>
                        <a href="{{ route('article.detail', ['article' => $recents]) }}">
                            <div class="inner">
                                <img class="img-fluid" src="upload/article/{{ $recents->Image }}" alt="post-title" />
                            </div>
                        </a>
                    </div>
                    <h5 class="post-title mb-0 mt-4"><a href="{{ route('article.detail', ['article' => $recents]) }}">{{ $recents->Title }}</a></h5>
                    <ul class="meta list-inline mt-2 mb-0">
                        <li class="list-inline-item"><a href="#">{{ $recents->IsPublisher}}</a></li>
                        <li class="list-inline-item"> {{ $recents->created_at->format(' d M Y ') }}</li>
                    </ul>
                </div>
                @endforeach
            </div>
            <!-- carousel arrows -->
            <div class="slick-arrows-bot">
                <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons"
                    aria-label="Previous"><i class="icon-arrow-left"></i></button>
                <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons"
                    aria-label="Next"><i class="icon-arrow-right"></i></button>
            </div>
        </div>
    </div>

    <!-- widget advertisement -->
    <!-- <div class="widget no-container rounded text-md-center">
        <span class="ads-title">- Sponsored Ad -</span>
        <a href="#" class="widget-ads">
            <img src="images/ads/ad-360.png" alt="Advertisement" />	
        </a>
    </div> -->

    <!-- widget tags -->
    {{-- <div class="widget rounded">
        <div class="widget-header text-center">
            <h3 class="widget-title">Tag Clouds</h3>
            <img src="user_asset/images/wave.svg" class="wave" alt="wave" />
        </div>
        <div class="widget-content">
            <a href="#" class="tag">#Trending</a>
            <a href="#" class="tag">#Video</a>
            <a href="#" class="tag">#Featured</a>
            <a href="#" class="tag">#Gallery</a>
            <a href="#" class="tag">#Celebrities</a>
        </div>
    </div> --}}
    {{-- <div class="widget rounded"></div> --}}

</div>
