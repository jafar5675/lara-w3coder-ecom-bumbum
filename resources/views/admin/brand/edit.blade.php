@extends('layouts.admin-master')

@section('brands')
    active
@endsection

@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Brands</span>
        </nav>
        <div class="sl-pagebody">
            <div class="card">
                <div class="card-header">Update New Brand</div>
                <div class="card-body">
                    <form action="{{ route('update-brand') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                        <input type="hidden" name="id" value="{{ $brand->id }}">
                        <div class="row row-sm">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Brand Name English:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="brand_name_en"
                                        value="{{ $brand->brand_name_en }}" placeholder="Enter brand_name_en">
                                    @error('brand_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Brand Name Bangla:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="brand_name_bn"
                                        value="{{ $brand->brand_name_bn }}" placeholder="Enter brand_name_bn">
                                    @error('brand_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Brand Image:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" name="brand_image">
                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info">Update Brand</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
