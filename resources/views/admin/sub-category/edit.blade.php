@extends('layouts.admin-master')
@section('category')
    active show-sub
@endsection
@section('sub-category')
    active
@endsection

@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Sub-Category</span>
        </nav>
        <div class="sl-pagebody">
            <div class="card">
                <div class="card-header">Update New Sub-Category</div>
                <div class="card-body">
                    <form action="{{ route('update-sub-category') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $subcategory->id }}">

                        <div class="row row-sm">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Select Category:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control select2-show-search" name="category_id"
                                        data-placeholder="Select one">
                                        <option label="Choose one"></option>
                                        @foreach ($categories as $cat)
                                            <option
                                                value="{{ $cat->id }}"{{ $cat->id == $subcategory->category_id ? 'selected' : '' }}>
                                                {{ ucwords($cat->category_name_en) }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Sub-Category Name English:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="subcategory_name_en"
                                        value="{{ $subcategory->subcategory_name_en }}"
                                        placeholder="Enter sub category_name_en">
                                    @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Sub-Category Name Bangla:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="subcategory_name_bn"
                                        value="{{ $subcategory->subcategory_name_bn }}"
                                        placeholder="Enter sub category_name_bn">
                                    @error('subcategory_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info">Update Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
