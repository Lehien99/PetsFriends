@extends('admin.layout.index')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"> Article</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the .</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Article</h6>
            </div>
            @if (session('Message'))
                <div class="alert alert-success">
                    {{ session('Message') }}
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>IsPublisher</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Create_at</th>
                                <th>Status</th>
                                <th>Action</th>
                                {{-- <th>Delete</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($article as $art)
                                <tr>
                                    <td>{{ $art->id }}</td>
                                    <td>{{ $art->IsPublisher }}</td>
                                    <td>{{ $art->category->Name }}</td>
                                    <td> <a style="text-decoration: none" href="admin/manage/article/{{ $art->id }}"> {{ $art->Title }}</a> </td>
                                    <td>{{ $art->created_at->format(' d M Y ') }}</td>
                                    <td>
                                        @if ($art->status == 0)
                                            <span class="label bg-c-pink m-l-10">{{ 'Rejected' }}</span>
                                        @else
                                            <span class="label bg-c-green m-l-10 f-10">{{ 'Approved' }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ url('admin/article/toggle-approve') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="articleID" value="{{ $art->id }}">
                                            <button class="btn btn-outline-success btn-round disabled"
                                                value="on" name="Status">Approved</button>
                                            <button class="btn btn-outline-danger btn-round"
                                                value="off " name="Status">Rejected</button>

                                            {{-- <input class="btn btn-primary" type="submit" name="Done" id=""> --}}

                                        </form>
                                    </td>
                                    {{-- <td class="center "><i class="fa fa-trash-o  fa-fw"></i><button
                                            class="center btn btn-danger"
                                            onclick="handleDelete({{ $art->id }})">Delete</button> </td> --}}
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
            <form action="" method="POST" id="deleteArticleForm">
                @csrf
                {{-- @method('DELETE') --}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this article</p>
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
        function handleDelete(id) {
            var form = document.getElementById('deleteArticleForm')
            form.action = 'admin/article/delete/' + id
            $('#deleteModal').modal('show')
        }
    </script>

@endsection
