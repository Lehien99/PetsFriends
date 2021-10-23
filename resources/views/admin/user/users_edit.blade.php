@extends('admin.layout.index')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Account
                        <small>Edit </small>
                    </h1>
                </div>

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

                    <form action="admin/user/edit/{{ $user->id }}" method="POST">
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
                            <input class="form-control" name="Name" value="{{ $user->name }}"
                                placeholder="Please Enter  Name" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="Email" type="email" value="{{ $user->email }}"
                                placeholder="Please Enter Email " />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="Password" type="password"
                                placeholder="Please Enter Password" />
                        </div>

                        <button type="submit" class="btn btn-primary">Role Edit</button>
                    </form>
                </div>
            </div>

        </div>

    </div>



@endsection
