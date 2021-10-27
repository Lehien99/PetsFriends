@extends('index')

@section('contents')
    <div class="container-xl">
        <div class="container-fluid mt-5">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"> Article</h1>
            <p class="mb-4">List of articles that you have posted</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">My Article</h6>
                </div>
                @if (session('Message'))
                    <div class="alert alert-success">
                        {{ session('Message') }}
                    </div>
                @endif
                <div class="card-block">
                    <section class="header-main border-bottom bg-white">
                        <div class="container-fluid">
                            <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
                                <form class="d-flex search-form"  type="get" action="/user/manage/search">
                                <div class="col-md-2"> </div>
                                <div class="col-md-8">
                                    <div class="d-flex form-inputs">  <input class="form-control me-2" name="query" type="search"
                                        placeholder="Search my Article and press enter ..." aria-label="Search"></div>             
                                </div>
                                <div class="col-md-2">
                                    <div class="d-flex d-none d-md-flex flex-row align-items-center">
                                        {{-- <div class="d-flex flex-column ms-2"> <span class="qty">Search</span>  </div> --}}
                                        <button class="btn btn-default" type="submit"><i
                                            class="icon-magnifier"></i></button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Summary</th>
                                    <th>Category</th>
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
                                        <td><img src="upload/article/{{ $art->Image }}" alt="imageArticle"
                                                style="height:100px; width:500px"></td>
                                        <td> {{ $art->Title }} </td>
                                        <td>{{ $art->Summary }}</td>
                                        <td>{{ $art->category->Name }}</td>
                                        <td>{{ $art->created_at->format(' d M Y ') }}</td>
                                        <td>
                                            @if ($art->status == 0)
                                                <span class="label bg-c-pink m-l-10">{{ 'Rejected' }}</span>
                                            @else
                                                <span class="label bg-c-green m-l-10 f-10">{{ 'Approved' }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-round " title="" data-toggle="tooltip"
                                                data-original-title="Delete" class="center btn btn-danger"
                                                onclick="handleDelete({{ $art->id }})">
                                                <i class="far fa-trash-alt"></i> </button>

                                            <a class="btn btn-success btn-round " class="center btn "
                                                href="user/article/edit/{{ $art->id }}">
                                                <i class="fas fa-pen-square"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3">{{ $article->links() }}</div>
            </div>
        </div>


        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" method="POST" id="deleteArticleForm">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delte Article</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this Article</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No. Go back</button>
                            <button type="submit" class="btn btn-danger">Yes. Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteArticleForm')
            form.action = 'user/article/delete/' + id
            $('#deleteModal').modal('show')
        }
    </script>

@endsection
