@extends('index')
@section('contents')
<section class="main-content mt-3 mb-3">
    <div class="container-xl">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">{{$article->category->Name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$article->Title}}</li>
            </ol>
        </nav>
    

        <div class="row gy-4">

            <div class="col-lg-8">
                <!-- post single -->
                <div class="post post-single">
                    <!-- post header -->
                    <div class="post-header">
                        <h1 class="title mt-0 mb-3">{{$article->Title}}</h1>
                        <ul class="meta list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>{{$article->IsPublisher}}</a></li>
                            <li class="list-inline-item"><a href="#">Trending</a></li>
                            <li class="list-inline-item">{{$article->created_at->format(' d M Y ')}}</li>
                        </ul>
                    </div>
                    <!-- featured image -->
                    <div class="featured-image">
                        <img src="upload/article/{{$article->Image}}" alt="post-title" />
                    </div>
                    <!-- post content -->
                    <div class="post-content clearfix">
                        {!!$article ->Content!!}
                    </div>
                    <!-- post bottom section -->
                    <div class="post-bottom">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-6 col-12 text-center text-md-start">
                                <!-- tags -->
                                <a href="#" class="tag">#Trending</a>
                                <a href="#" class="tag">#Video</a>
                                <a href="#" class="tag">#Featured</a>
                            </div>
                            <div class="col-md-6 col-12">
                                <!-- social icons -->
                                <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="spacer" data-height="50"></div>

                <div class="about-author padding-30 rounded">
                    <div class="thumb">
                        <img src="images/other/avatar-about.png" alt="Katen Doe" />
                    </div>
                    <div class="details">
                        <h4 class="name"><a href="#">Katen Doe</a></h4>
                        <p>Hello, I’m a content writer who is fascinated by content fashion, celebrity and lifestyle. She helps clients bring the right content to the right people.</p>
                        <!-- social icons -->
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

                <div class="spacer" data-height="50"></div>
                <div class="section-header">
                    <h3 class="section-title">Comments ({{$article->comments->count()}})</h3>
                    <img src="user_asset/images/wave.svg" class="wave" alt="wave" />
                </div>

                @include('pages.replys',['comments' => $article->comments, 'post_id' => $article->id])
                <div class="section-header">
                    <h3 class="section-title">Leave Comment</h3>
                    <img src="user_asset/images/wave.svg" class="wave" alt="wave" />
                </div>
                <!-- comment form -->
                <div class="comment-form rounded bordered padding-30">
    
                    <form id="comment-form" class="comment-form" method="POST" action="/comment/add">
                        @csrf
            
                        {{-- <div class="messages"></div> --}}
                        
                        <div class="row">
    
                            <div class="column col-md-12">
                                <!-- Comment textarea -->
                                <div class="form-group">
                                    <textarea name="Comment" class="form-control" rows="4" placeholder="Your comment here..." required="required"></textarea>
                                </div>
                            </div>
    
                            <div class="column col-md-6">
                                <!-- Email input -->
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="article_id" value="{{ $article->id }}" >
                                </div>
                            </div>
                    
                        </div>
    
                        <button type="submit" value="Submit" class="btn btn-default">Submit</button>
    
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- sidebar -->
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
</section>

    @include('layouts.insta')
    @include('layouts.footer')

@endsection
