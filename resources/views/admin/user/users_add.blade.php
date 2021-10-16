@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper mx-auto">
        <div class="container-fluid">
            <div class="">
                <div class="col-lg-12">
                    <h1 class="text-dark"> Add User
                        {{-- <small>Add</small> --}}
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
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
                    <form action="admin/user/add" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="Role" id="Role">
                                @foreach ($role as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>User Name</label>
                            <input class="form-control" name="Name" placeholder="Please Enter User Name" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="Email" type="email" placeholder="Please Enter Email " />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="Password" type="password"
                                placeholder="Please Enter Password" />
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <input class="form-control" id="avatar" type="file" name="avatar" />
                        </div>
                        {{-- <div class="form-group">
                       <label> Confirm Password</label>
                       <input class="form-control"  name="password" type="password" placeholder="Please Enter Password" />
                   </div> --}}
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
