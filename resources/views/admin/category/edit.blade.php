@extends('layouts.admin-master')

@section('category')
    active sub-show
@endsection
@section('add-category')
    active
@endsection

@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Category</span>
        </nav>
        <div class="sl-pagebody">
            <div class="card">
                <div class="card-header">Update New Category</div>
                <div class="card-body">
                    <form action="{{ route('update-category') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <div class="row row-sm">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Category Icon:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="category_icon"
                                        value="{{ $category->category_icon }}" placeholder="Enter Your category Icon">
                                    @error('category_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Category Name English:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="category_name_en"
                                        value="{{ $category->category_name_en }}" placeholder="Enter brand_name_en">
                                    @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Category Name Bangla:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="category_name_bn"
                                        value="{{ $category->category_name_bn }}" placeholder="Enter brand_name_bn">
                                    @error('category_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info">Update Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
