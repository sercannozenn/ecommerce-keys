@extends('layouts.admin')
@section('title', 'Products')

@section('css')
    <link href="{{ asset('assets/vendors/select2/select2.css') }}" rel="stylesheet">
    <style>
        .productImage
        {
            max-height: 120px;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ isset($record) ? route('admin.products.update', ['product' => $record->product_id])  :  route('admin.products.store')}}"
    enctype="multipart/form-data" id="productForm">
        @csrf
        @isset($record)
            @method('PUT')
        @endisset
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="page-header no-gutters has-tab">
            <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                <div class="media align-items-center m-b-15">
                    @isset($record)
                        <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                            <img src="{{ asset($record->featureImage->image) }}" alt="">
                        </div>
                        <div class="m-l-15">
                            <h4 class="m-b-0">{{ $record->product_name }}</h4>
                            <p class="text-muted m-b-0">Code: {{ $record->product_code }}</p>
                        </div>
                    @endisset
                </div>
                <div class="m-b-15">
                    <button class="btn btn-primary" type="button" id="saveBtn">
                        <i class="anticon anticon-save"></i>
                        <span>Save</span>
                    </button>
                </div>
            </div>
            <ul class="nav nav-tabs" >
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#product-edit-basic">Basic Info</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#product-edit-description">Description</a>
                </li>
                @isset($record)
                    <li class="nav-item">
                        <a class="nav-link" id="tab-product-images" data-toggle="tab" href="#product-images">Product Images</a>
                    </li>
                @endisset
            </ul>
        </div>
        <div class="tab-content m-t-15">
            <div class="tab-pane fade show active" id="product-edit-basic" >
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-semibold" for="productName">Product Name</label>
                            <input name="product_name" type="text" class="form-control" id="productName"
                                   placeholder="Product Name" value="{{ $record->product_name ?? old('product_name') }}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold" for="quantity">Product Quantity</label>
                            <input name="quantity" type="number" class="form-control" id="quantity"
                                   placeholder="Product Quantity" value="{{ $record->quantity ?? old('quantity', 0) }}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold" for="productPrice">Price</label>
                            <input name="price" type="text" class="form-control" id="productPrice" placeholder="Price"
                                   value="{{ $record->price ?? old('price', '0.00') }}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold" for="productCategory">Category</label>
                            <select class="custom-select" id="productCategory" name="category_id">
                                <option value="" selected>Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}"
                                        {{ isset($record) && $record->category->category_id == $category->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold" for="productStatus">Status</label>
                            <select name="is_active" class="custom-select" id="productStatus">
                                <option value="" selected>Choose Status</option>
                                <option value="1" {{ isset($record) && $record->is_active == 1 ? 'selected' : '' }}>In Stock</option>
                                <option value="0" {{ isset($record) && $record->is_active == 0 ? 'selected' : '' }}>Out of Stock</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input name="images[]" type="file" class="custom-file-input" id="customFile" multiple>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="product-edit-description">
                <div class="card">
                    <div class="card-body">
                        <label for="productDescriptionShort" class="my-4">Short Description</label>
                        <input type="hidden" name="product_short_description" id="productShortDescriptionInput">
                        <input type="hidden" name="product_description" id="productDescriptionInput">
                        <div id="productDescriptionShort">
                            {!! $record->product_short_description ?? '' !!}
                        </div>
                        <label for="productDescription" class="my-4">Description</label>
                        <div id="productDescription">
                            {!! $record->product_description ?? '' !!}
                        </div>

                    </div>
                </div>
            </div>
            @isset($record)
                <div class="tab-pane fade" id="product-images">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach($record->images as $image)
                                    <div class="col-md-3">
                                        <img class="img-fluid productImage" src="{{ asset($image->image) }}" alt="">

                                            <div class="mt-3">
                                                <p style="margin-bottom: 0; visibility: {{ $image->feature_image ? 'visible' : 'hidden' }}">
                                                        Featured Image
                                                </p>
                                            </div>
                                        <hr style="margin-top: 5px; margin-bottom: 10px">
                                        <div class="btn-group mt-4">
                                            <a href="{{ route('admin.products.deleteImage', ['product' => $record->product_id, 'image' => $image->id]) }}"
                                               type="button" class="btn btn-danger">
                                                <span>Delete</span>
                                            </a>
                                            <a href="{{ route('admin.products.featureImage', ['product' => $record->product_id, 'image' => $image->id]) }}"
                                               class="btn btn-primary">
                                                <span>Feature Image</span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
        </div>
    </form>

@endsection

@section('js')
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/e-commerce-product-edit.js') }}"></script>
    <script>
        new Quill('#productDescriptionShort', {
            theme: 'snow',
        });
        $('#saveBtn').click(function ()
        {
            $('#productDescriptionInput').val($('#productDescription > .ql-editor').html());
            $('#productShortDescriptionInput').val($('#productDescriptionShort > .ql-editor').html());
            $('#productForm').submit();
        });

        window.onload = function ()
        {
            const url = window.location.href;
            if (url.indexOf('#product-images') != -1)
            {
                    $('#tab-product-images')[0].click();
            }
        };
    </script>

@endsection
