@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">Roles
                   <small>Add</small>
               </h1>
           </div>

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

               <form action="{{asset('admin/roles/Add')}}" method="POST">
                   
                   <input type="hidden" name ="_token" value="{{csrf_token()}}"/>
                   
                   <div class="form-group">
                       <label>Role Name</label>
                       <input class="form-control" name="Name" placeholder="Please Enter Role Name" />
                   </div>
                   <button type="submit" class="btn btn-primary">Role Add</button>
                   <button type="reset" class="btn btn-danger">Reset</button>
               </form>
           </div>
       </div>

   </div>

</div>



@endsection