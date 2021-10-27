@extends('index')

@section('contents')
    {{-- <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div  class="col-lg-4 col-md-5">
                <div class="card card-user">
                    <div class="image">
                      <img src="assets/img/background.jpg" alt="...">
                    </div>
                    <div class="content">
                      <div class="author">
                        <img class="avatar border-white" src="assets/img/faces/face-2.jpg" alt="...">
                        <h4 class="title">Chet Faker<br>
                          <a href="#"><small>@chetfaker</small></a>
                        </h4>
                      </div>
                      <p class="description text-center">
                        "I like the way you work it <br>
                        No diggity <br>
                        I wanna bag it up"
                      </p>
                    </div>
                    <hr>
                    <div class="text-center">
                      <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                          <h5>12<br><small>Files</small></h5>
                        </div>
                        <div class="col-md-4">
                          <h5>2GB<br><small>Used</small></h5>
                        </div>
                        <div class="col-md-3">
                          <h5>24,6$<br><small>Spent</small></h5>
                        </div>
                      </div>
                    </div>
                  </div>
             </div>
             <div class="col-lg-8 col-md-7"></div>
         </div>
     </div>
 </div> --}}
    <section class="main-content">
        <div class="container-xl">
            <div class="row gy-4">
                <div class="content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="post-tabs rounded bordered">
                                    <div class="image">
                                        <img src="upload/background/background.jpg" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <div class="author">
                                            <a href="#">
                                                <img class="avatar border-gray"
                                                    src="upload/avatar/{{ Auth::user()->avatar }}" alt="...">
                                                <h5 class="title text-center">{{ Auth::user()->name }}</h5>
                                            </a>
                                            {{-- <p class="description">
                                            @chetfaker
                                        </p> --}}
                                        </div>
                                        <p class="description text-center">
                                            "I like the way you work it <br>
                                            I wanna bag it up"
                                        </p>
                                    </div>
                                    <div class="card-footer" style="background-color:white">
                                        <hr>
                                        <div class="button-container">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-6 ml-5">
                                                    <h5>{{ $article_count }}<br><small>Article</small></h5>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-6 ml-auto mr-auto">
                                                    <h5>@if ($article_count > 0) {{ $views_count[0]->views }} @else {{ $view_count = 0 }} @endif<br><small>View</small></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            {{-- <div class="card card-user">
                                <div class="card-header">
                                    <h5 class="card-title">Edit Profile</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">

                                            <div class="col-md-9 px-1">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" placeholder="Username"
                                                        value="michael23">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="update ml-auto mr-auto">
                                                <button type="submit" class="btn btn-primary btn-round">Update
                                                    Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                            <div class="card card-user">
                                <div class="post-tabs rounded bordered">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="text-right">Profile Settings</h4>
                                        </div>
                                        <form action="user/profile/{{ $user->id }}" method="POST">
                                            @csrf
                                            <div class="row mt-3">
                                                <div class="col-md-6"><label class="labels">Name</label><input
                                                        class="form-control" name="Name" value="{{ $user->name }}"
                                                        placeholder="Please Enter  Name" />
                                                </div>

                                                <div class="col-md-6"><label
                                                        class="labels">Email</label><input class="form-control"
                                                        name="Email" type="email" value="{{ $user->email }}"
                                                        placeholder="Please Enter Email " /></div>

                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6"><label class="labels">Password</label>
                                                    <input class="form-control" name="Password" type="password"
                                                        placeholder="Please Enter Password" />
                                                </div>

                                            </div>
                                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                                    type="submit">Save Profile</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection
@push('styles')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endpush
