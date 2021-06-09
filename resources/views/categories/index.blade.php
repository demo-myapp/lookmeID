@extends('layouts.admin')

@section('title', 'Categories')

@section('content-url')
<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Categories</li>
</ol>
@endsection

@section('content')

      <div class="row">
        <div class="col-lg-5">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">New Category</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Sub Category</label>
                        <select name="parent_id" class="form-control">
                            <option value="">None</option>
                            @foreach ($parent as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Add</button>
                    </div>
                </form>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Categories</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Category</th>
                          <th>Sub Category</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                    <tbody>
                        @forelse ($category as $val)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $val->name }}</strong></td>
                            <td>{{ $val->parent ? $val->parent->name:'-' }}</td>
                            <td>{{ $val->created_at->format('d-m-Y') }}</td>
                            <td>
                              <a href="{{ route('category.edit', $val->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
                                          <form action="{{ route('category.destroy', $val->id) }}" method="post">
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
                            <td colspan="5" class="text-center">Empty data</td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
                </div>
                {!! $category->links() !!}
            </div>
          </div>
        </div>
      </div>    
@endsection