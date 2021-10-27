{{-- @extends('layouts.app') --}}
@extends('index')

@section('contents')

    <!-- Page Content -->
    <section class="main-content">
        <div class="container-xl">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="">
                        <div class="">
                            <h3 class="text-dark"> Add Article
                                {{-- <small>Add</small> --}}
                            </h3>
                        </div>
                        <div class="" style="padding-bottom:120px">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        {{ $err }}<br>

                                    @endforeach
                                </div>
                            @endif

                            @if (session('Message'))

                                <div class="alert alert-success">
                                    {{ session('Message') }}
                                </div>


                            @endif
                            <form action="user/article/add" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <p>Category</p>
                                    <select class="form-control" name="Category" id="Category">
                                        @foreach ($category as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <p>Title</p>
                                    <input class="form-control" name="Title" placeholder="Please Enter Title Name" />
                                </div>
                                <div class="form-group">
                                    <p>NickName</p>
                                    <input class="form-control" name="IsPublisher"
                                        placeholder="Please Enter NickName Name" />
                                </div>
                                <div class="form-group">
                                    <p>Summary</p>
                                    <textarea name="Summary" id="Summary" class="form-control "></textarea>
                                </div>
                                <div class="form-group">
                                    <p>Content</p>
                                    <textarea name="Content" id="editor1" class="form-control "></textarea>
                                </div>
                                <div class="form-group">
                                    <p>Image</p>
                                    <input class="form-control" type="file" name="Image" id='Image' />
                                    {{-- <input type="file" class="form-control" name="picture" id="picture"> --}}
                                </div>
                                 <div class="form-group" style="display:none">
                                    <p>HighLights</p>
                                    <label class="radio-inline">
                                        <input name="Highlight" value="0" checked="" style="display:none" type="radio">Không
                                    </label>
                                    <label class="radio-inline">
                                        <input name="Highlight" style="display:none" value="1" type="radio">Có
                                    </label>
                                </div> 
                                <div class="form-group">
                                    {{-- <p>{{ Auth::user()->id }} </p> --}}
                                    <input class="form-control" value="{{ Auth::user()->id }}" type="hidden"
                                        name="Witer" placeholder="Please Enter Title Name" />
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <form>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- /.container-fluid -->

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


@section('js')
    <script>
        CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserWindowWidth: '1000',
            filebrowserWindowHeight: '700'
        });
    </script>
@endsection
