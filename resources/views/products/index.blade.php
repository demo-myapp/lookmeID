@extends('layouts.admin')

@section('title', 'Products')

@section('content-url')
<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Products</li>
</ol>  
@endsection

@section('content')
<main class="main">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Products List
                                <div class="float-right">
                                    {{-- <a href="{{ route('product.bulk') }}" class="btn btn-danger btn-sm">Upload with Excel</a> --}}
                                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">Add</a>
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <form action="{{ route('product.index') }}" method="get">
                                <div class="input-group mb-3 col-md-3 float-right">
                                    <input type="text" name="q" class="form-control" placeholder="Search..." value="{{ request()->q }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Course</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($product as $row)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/products/' . $row->image) }}" width="100px" height="100px" alt="{{ $row->name }}">
                                            </td>
                                            <td>
                                                <strong>{{ $row->name }}</strong><br>
                                                <label>Category: <span class="badge badge-info">{{ $row->category->name }}</span></label><br>
                                            </td>
                                            <td>@currency($row->price)</td>
                                            <td>{{ $row->created_at->format('d-m-Y') }}</td>
                                            <td>{!! $row->status_label !!}</td>
                                            <td>
                                                <a href="{{ route('product.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#modalDelete" data-toggle="modal" class="btn btn-danger btn-sm">Delete</a>
                                            <!-- Modal -->
                                                <div class="modal fade" id="modalDelete">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Conformation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure want to delete ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                        <form action="{{ route('product.destroy', $row->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <!-- End Modal -->
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Empty data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {!! $product->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection