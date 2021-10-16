@extends('index')
@section('contents')

    <section class="main-content mt-3">
        <div class="container-xl">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ $article->category->Name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $article->Title }}</li>
                </ol>
            </nav>
            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="post post-single">
                        <!--  header -->
                        <div class="post-header">
                            <h1 class="title mt-0 mb-3">{{ $article->Title }}</h1>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png"
                                            class="author" alt="author" />{{ $article->IsPublisher }}</a></li>
                                <li class="list-inline-item"><a href="#">Trending</a></li>
                                <li class="list-inline-item">{{ $article->created_at->format(' d M Y ') }}</li>
                            </ul>
                        </div>
                        <!-- image -->
                        <div class="featured-image">
                            <img src="upload/article/{{ $article->Image }}" alt="post-title" />
                        </div>
                        <!-- content -->
                        <div class="post-content clearfix">
                            {!! $article->Content !!}
                        </div>
                        <div class="post-bottom">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-6 col-12 text-center text-md-start">
                                    <!-- tags -->
                                    <a href="#" class="tag">#Trending</a>
                                    <a href="#" class="tag">#Video</a>
                                    <a href="#" class="tag">#Featured</a>
                                </div>
                                <div class="col-md-6 col-12">
                                    <!--  icons -->
                                    <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a>
                                        </li>
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
                            <p>Hello, I’m a content writer who is fascinated by content fashion, celebrity and lifestyle.
                                She helps clients bring the right content to the right people.</p>
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
                    {{-- Start comment --}}
                    <div class="spacer" data-height="50"></div>
                    <div class="section-header">
                        <h3 class="section-title">Comments ({{ $article->comments->count() }})</h3>
                        <img src="user_asset/images/wave.svg" class="wave" alt="wave" />
                    </div>


                    <div class="comments bordered padding-30 rounded">
                        @foreach ($article->comments as $comment)
                            <ul class="comments">
                                <!-- comment item -->
                                <li class="comment rounded">
                                    <div class="thumb">
                                        <img src="{{ asset('storage/user/' . $comment->user->image) }}"
                                            alt="{{ $comment->user->image }}">
                                    </div>
                                    <div class="details">
                                        <h4 class="name"><a href="#">{{ $comment->user->name }}</a></h4>
                                        <span class="date">
                                            {{ $comment->created_at->format('D, d M Y H:i') }}</span>
                                        {{ $comment->comment }}
                                        <p></p>
                                        <a class="btn btn-default btn-sm" id="reply-btn"
                                            onclick="showReplyForm('{{ $comment->id }}','{{ $comment->user->name }}')">Reply</a>
                                    </div>
                                </li>
                                @if ($comment->replies->count() > 0)
                                    @foreach ($comment->replies as $reply)
                                        <li class="comment child rounded">
                                            <div class="thumb">
                                                <img src="{{ asset('storage/user/' . $reply->user->image) }}"
                                                    alt="{{ $reply->user->image }}" />
                                            </div>
                                            <div class="details">
                                                <h4 class="name"><a href="#">{{ $reply->user->name }}</a></h4>
                                                <span
                                                    class="date">{{ $reply->created_at->format('D, d M Y H:i') }}</span>
                                                <p> {{ $reply->comment }}</p>
                                                <a  class="btn btn-default btn-sm" id="reply-btn"
                                                    onclick="showReplyForm('{{ $comment->id }}','{{ $reply->user->name }}')">Reply</a>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                @endif
                                {{-- When user login show reply fourm --}}
                                @guest
                                    {{-- Show none --}}
                                @else
                                    <li class="comment child rounded" id="reply-form-{{ $comment->id }}"
                                        style="display: none">
                                        <div class="thumb">
                                            <img src="{{ asset('storage/user/' . Auth::user()->image) }}"
                                            alt="{{ Auth::user()->image }}" width="50px" />
                                        </div>
                                        <div class="details">
                                            <h4 class="name"><a href="#">{{ Auth::user()->name }}</a></h4>
                                            <p class="date">{{date('D, d M Y H:i')}}</p>
                                         
                                                <form method="post" action="{{ route('reply.add') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="column col-md-12">
                                                            <div class="form-group">
                                                                <textarea id="reply-form-{{ $comment->id }}" name="comment" class="form-control" rows="4"
                                                                    placeholder="Your reply here..." required="required"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="column col-md-6">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" name="article_id"
                                                                    value="{{ $article->id }}">
                                                            </div>
                                                        </div>
                                                        <div class="column col-md-6">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" name="comment_id"
                                                                    value="{{ $comment->id }}">
                                                            </div>
                                                        </div>
                                                        <button type="submit" value="Submit" class="btn btn-default">Reply</button>
                          
                                                    </div>
                                                </form>
                                        </div>

                                        {{-- <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="desc">
                                                    <h5><a href="#">{{ Auth::user()->name }}</a></h5>
                                                    <p class="date">{{ date('D, d M Y H:i') }}</p>
                                                    <div class="row flex-row d-flex">
                                                        <form method="POST">
                                                            @csrf
                                                            <div class="col-lg-12">
                                                                <textarea id="reply-form-{{ $comment->id }}-text" cols="60"
                                                                    rows="2" class="form-control mb-10" name="message"
                                                                    placeholder="Messege" onfocus="this.placeholder = ''"
                                                                    onblur="this.placeholder = 'Messege'"
                                                                    required=""></textarea>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn-reply text-uppercase ml-3">Reply</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </li>
                                @endguest
                            </ul>
                        @endforeach
                    </div>

                    <!-- End comment-sec Area -->

                    <!-- Start commentform Area -->
                    <section class="commentform-area pb-120 pt-80 mb-100">
                        @guest
                            <div class="spacer" data-height="50"></div>
                            <div class="container">
                                <h4>Please Sign in to post comments - <a href="{{ route('login') }}">Sing in</a> or <a
                                        href="{{ route('register') }}">Register</a></h4>
                            </div>
                        @else
                            <div class="spacer" data-height="50"></div>
                            <div class="section-header">
                                <h3 class="section-title">Leave Comment</h3>
                                <img src="images/wave.svg" class="wave" alt="wave" />
                            </div>
                            <!-- comment form -->
                            <div class="comment-form rounded bordered padding-30">


                                <form id="comment-form" class="comment-form" method="POST" action="/comment/add">
                                    @csrf

                                    <div class="messages"></div>

                                    <div class="row">

                                        <div class="column col-md-12">
                                            <!-- Comment textarea -->
                                            <div class="form-group">
                                                <textarea name="Comment" class="form-control" rows="4"
                                                    placeholder="Your comment here..." required="required"></textarea>
                                            </div>
                                        </div>

                                        <div class="column col-md-6">
                                            <!-- Email input -->
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="article_id"value="{{ $article->id }}">
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" value="Submit" class="btn btn-default">Submit</button>

                                </form>
                            </div>
                        @endguest
                    </section>

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

@push('footers')
    <script type="text/javascript">
        function showReplyForm(commentId, user) {
            var x = document.getElementById(`reply-form-${commentId}`);
            var input = document.getElementById(`reply-form-${commentId}-text`);
            if (x.style.display === "none") {
                x.style.display = "block";
                input.innerText = `@${user} `;
            } else {
                x.style.display = "none";
            }
        }
    </script>
@endpush
