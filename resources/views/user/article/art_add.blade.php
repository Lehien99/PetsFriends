{{-- @extends('layouts.app') --}}
@extends('index')

@section('contents')
    
<!-- Page Content -->
<div id="page-wrapper mx-auto">
   <div class="container-fluid">
       <div class="">
           <div class="col-lg-12">
               <h1 class="text-dark"> Add Article
                   {{-- <small>Add</small> --}}
               </h1>
           </div>
           <!-- /.col-lg-12 -->
           <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors)>0)
                     <div class="alert alert-danger">
                         @foreach($errors->all() as $err)
                            {{$err}}<br>

                         @endforeach
                     </div>
                @endif

                @if(session('Message'))

                     <div class="alert alert-success">
                         {{session('Message')}}
                     </div>


                @endif
               <form action="user/article/add" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name ="Category" id="Category">
                      @foreach($category as $cate)
                        <option value="{{$cate->id}}">{{$cate->Name}}</option>
                       @endforeach
                    </select>
                </div>
                   <div class="form-group">
                       <label>Title</label>
                       <input class="form-control" name="Title" placeholder="Please Enter Title Name" />
                   </div>
                   <div class="form-group">
                       <label>IsPublisher</label>
                       <input class="form-control"  name="IsPublisher" placeholder="Please Enter IsPublisher Name" />
                   </div>
                   <div class="form-group">
                       <label>Summary</label>
                       <textarea name="Summary" id="Summary" class="form-control " ></textarea>
                   </div>
                   <div class="form-group">
                        <label>Content</label>
                        <textarea name="Content" id="editor1" class="form-control "></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="file" name="Image" id='Image' />
                        {{-- <input type="file" class="form-control" name="picture" id="picture"> --}}
                    </div>
                   <div class="form-group">
                       <p>HighLights</p>
                       <label class="radio-inline">
                           <input name="Highlight" value="0" checked="" type="radio">Không
                       </label>
                       <label class="radio-inline">
                           <input name="Highlight" value="1" type="radio">Có
                       </label>
                   </div>
                    <div class="form-group">
                        {{-- <p>{{ Auth::user()->id }} </p> --}}
                        <input class="form-control" value="{{ Auth::user()->id }}" type="hidden" name="Witer" placeholder="Please Enter Title Name" />              
                    </div>

                   <button type="submit" class="btn btn-primary">Add</button>
                   <button type="reset" class="btn btn-danger">Reset</button>
               <form>
           </div>
       </div>
       <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection


@section('js')
<script>
    CKEDITOR.replace( 'editor1', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
} );

</script>
@endsection
