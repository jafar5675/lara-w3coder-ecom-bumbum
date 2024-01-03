@extends('layouts.admin-master')
@section('category')
    active show-sub
@endsection
@section('subsubcategory')
    active
@endsection

@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Sub Sub-Category</span>
        </nav>
        <div class="sl-pagebody">
            <div class="card">
                <div class="card-header">Update New Sub Sub-Category</div>
                <div class="card-body">
                    <form action="{{ route('update-sub-subcategory') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $subsubcat->id }}">

                        <div class="row row-sm">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Sub Sub-Category Name English:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="subsubcategory_name_en"
                                        value="{{ $subsubcat->subsubcategory_name_en }}"
                                        placeholder="Enter sub category_name_en">
                                    @error('subsubcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Sub Sub-Category Name Bangla:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="subsubcategory_name_bn"
                                        value="{{ $subsubcat->subsubcategory_name_bn }}"
                                        placeholder="Enter sub category_name_bn">
                                    @error('subsubcategory_name_bn')
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
