@extends('admin.layout.index')

@section('content')    
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Category</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the .</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Category</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>status</th>
                            <th>Delete</th>
                            <th>Eddit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $cate)
                        <tr>
                            <td>{{$cate->id}}</td>
                            <td>{{$cate->Name}}</td>
                            <td>Hiện</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{asset('admin/category/delete')}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{asset('admin/category/edit')}}">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection