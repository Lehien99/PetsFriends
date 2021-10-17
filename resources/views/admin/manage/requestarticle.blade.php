@extends('admin.layout.index')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"> Article</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the .</p>
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Content</h6>
                    </div>
                    <div class="card-body">
                        {!! $article->Content !!}
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Information Details</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row  mt-3 ">
                            <div class="col-sm-3">Author:</div>
                            <div class="col-sm-9">{{ $article->IsPublisher }}</div>
                        </div>
                        <div class="row  mt-3 ">
                            <div class="col-sm-3">Category:</div>
                            <div class="col-sm-9">{{ $article->category->Name }}</div>
                        </div>
                        <div class="row  mt-3 ">
                            <div class="col-sm-3">Summary:</div>
                            <div class="col-sm-9">{{ $article->Summary }}</div>
                        </div>
                        <div class="row mt-3 ">
                            <div class="col-sm-3">Created at:</div>
                            <div class="col-sm-9">{{ $article->created_at->format('D, d M Y ') }}</div>
                        </div>
                        <div class="row mt-3 ">
                            <div class="col-sm-3">Status:</div>
                            <div class="col-sm-9">
                                @if ($article->status == 0)
                                    <span class="label label-success">{{ 'Rejected' }}</span>
                                @else
                                    <span class="label label-danger">{{ 'Approved' }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3 ">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <form action="{{ url('admin/article/toggle-approve') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="articleID" value="{{ $article->id }}">
                                    <button class="btn btn-outline-success btn-round disabled" value="on"
                                        name="Status">Approved</button>
                                    <button class="btn btn-outline-danger btn-round" value="off"
                                        name="Status">Rejected</button>

                                    {{-- <input class="btn btn-primary" type="submit" name="Done" id=""> --}}

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
