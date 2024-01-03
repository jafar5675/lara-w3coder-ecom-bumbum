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
            <span class="breadcrumb-item active">Category</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Category List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-30p">CName</th>
                                            <th class="wd-25p">Sub En</th>
                                            <th class="wd-25p">Sub Bn</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->category->category_name_en }}
                                                </td>
                                                <td>{{ $item->subcategory_name_en }}</td>
                                                <td>{{ $item->subcategory_name_bn }}</td>
                                                <td>
                                                    <a href="{{ url('admin/sub-category-edit/' . $item->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ url('admin/sub-category-delete/' . $item->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div><!-- table-wrapper -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add New Subcategory</div>
                        <div class="card-body">
                            <form action="{{ route('sub-category-store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-control-label">Select Category:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control select2-show-search" name="category_id"
                                        data-placeholder="Select one">
                                        <option label="Choose one"></option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Sub-Category Name English:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="subcategory_name_en"
                                        value="{{ old('subcategory_name_en') }}" placeholder="Enter sub category_name_en">
                                    @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Sub-Category Name Bangla:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="subcategory_name_bn"
                                        value="{{ old('subcategory_name-bn') }}" placeholder="Enter sub category_name_bn">
                                    @error('subcategory_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Add New</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
