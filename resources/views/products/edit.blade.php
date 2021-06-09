@extends('layouts.admin')

@section('title', 'Product Edit')

@section('content-url')
<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Product</li>
    <li class="breadcrumb-item active">Product Edit</li>
</ol>
@endsection

@section('content')
<main class="main">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Product Edit</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{old('name', $product->name) }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description"
                                        class="form-control">{{old('description', $product->description) }}</textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="1" {{old('status', $product->status) == '1' ? 'selected':'' }}>
                                            Publish</option>
                                        <option value="0" {{old('status', $product->status) == '0' ? 'selected':'' }}>
                                            Draft</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('status') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($category as $row)
                                        <option value="{{ $row->id }}"
                                            {{old('category_id', $product->category_id) == $row->id ? 'selected':'' }}>
                                            {{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="number" name="price" class="form-control"
                                            value="{{old('price', $product->price) }}" required>
                                    </div>
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Weight</label>
                                    <div class="input-group">
                                        <input type="number" name="weight" class="form-control"
                                            value="{{old('weight', $product->weight) }}" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Kg</div>
                                        </div>
                                    </div>
                                    <p class="text-danger">{{ $errors->first('weight') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="image">Product Image</label>
                                    <br>
                                    <img src="{{ asset('storage/products/' . $product->image) }}" width="100px"
                                        height="100px" alt="{{ $product->name }}">
                                    <hr>
                                    <input type="file" name="image" id="image" class="form-control">
                                    <p><strong>Leave it blank if you don't want to replace the image</strong></p>
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <img id="preview-image-before-upload" src="{{ asset('assets/img/no_image.png') }}"
                                        alt="preview image" width="200px" height="200px">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection