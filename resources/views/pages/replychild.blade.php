@foreach ($comments as $comment)
    <ul class="comments ">
        <!-- comment item -->
        <li class="comment child rounded">
            <div class="thumb">
                <img style="border-radius: 50%; width:30px; height:30px"
                    src="upload/avatar/{{ $comment->user->avatar }}" alt="{{ $comment->user->avatar }} ">
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
            <li class="comment child rounded">
                @include('pages.replychild', ['comments' => $comment->replies])
            </li>
        @else

        @endif
        <!-- When user login show reply fourm -->
        @guest
            <!--  Show none  -->
        @else
            <li class="comment child rounded" id="reply-form-{{ $comment->id }}" style="display: none">
                <div class="thumb">
                    <img style="border-radius: 50%; width:30px; height:30px" src="upload/avatar/{{ Auth::user()->avatar }}"
                        alt="" />
                </div>
                <div class="details">
                    <h4 class="name"><a href="#">{{ Auth::user()->name }}</a></h4>
                    <p class="date">{{ date('D, d M Y H:i') }}</p>

                    <form method="post" action="{{ route('reply.add') }}">
                        @csrf
                        <div class="row">
                            <div class="column col-md-12">
                                <div class="form-group">
                                    <textarea id="reply-form-{{ $comment->id }}" name="comment" class="form-control"
                                        rows="4" placeholder="Your reply here..." required="required"></textarea>
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
            </li>
        @endguest
    </ul>
@endforeach
