  <!-- section header -->
  {{-- @foreach ($comments as $comment)
      <!-- post comments -->
      <div class="comments bordered padding-30 rounded">

          <ul class="comments">

              <li class="comment rounded">
                  <div class="thumb">
                      <img src="images/other/comment-1.png" alt="John Doe" />
                  </div>
                  <a href="" id="reply"></a>

                  <div class="details">
                      <h4 class="name"><a href="#">{{ $comment->user->name }}</a></h4>
                      <span class="date">{{ $comment->created_at->format(' d M Y ') }}</span>
                      <p>{{ $comment->comment }}</p>

                      <form method="post" action="{{ route('reply.add') }}">
                          @csrf
                          <div class="row">
                              <div class="column col-md-12">
                                  <div class="form-group">
                                      <textarea name="comment" class="form-control" rows="4"
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

                  @include('pages.replys', ['comments' => $comment->replies])
              </li>

          </ul>
      </div>

      <div class="spacer" data-height="50"></div>
  @endforeach --}}

  @foreach ($comments as $comment)
      <ul class="comments ">
          <!-- comment item -->
          <li class="comment rounded">
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
          @include('pages.replychild', ['comments' => $comment->replies])

          @guest
              <!--  Show none  -->
          @else
              <li class="comment child rounded" id="reply-form-{{ $comment->id }}" style="display: none">
                  <div class="thumb">
                      <img style="border-radius: 50%; width:30px; height:30px"
                          src="upload/avatar/{{ Auth::user()->avatar }}" alt="" />
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
