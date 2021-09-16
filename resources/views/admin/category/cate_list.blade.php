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
        @if(session('Message'))
        <div class="alert alert-success"> 
            {{session('Message')}}
        </div>
        @endif
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
                            <td class="center "><i class="fa fa-trash-o  fa-fw"></i><button class="center btn btn-danger" onclick="handleDelete({{$cate->id}})">Delete</button> </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{asset('admin/category/edit')}}">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST" id="deleteCategoryForm">
            @csrf
            {{-- @method('DELETE') --}}
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delte Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete this Category</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No. Go back</button>
                  <button type="submit" class="btn btn-danger">Yes. Delete</button>
                </div>
              </div>
        </form>
    </div>
  </div>


@endsection

@section('scripts')
<script>
    function handleDelete(id){
        var form = document.getElementById('deleteCategoryForm')
        form.action ='admin/category/delete/' + id
        $('#deleteModal').modal('show')
    }
</script>

@endsection