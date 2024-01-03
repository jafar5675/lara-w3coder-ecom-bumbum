@extends('layouts.admin-master')
@section('category')
    active show-sub
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
            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Category List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-30p">Category Icon</th>
                                            <th class="wd-25p">Category En</th>
                                            <th class="wd-25p">Category Bn</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $item)
                                            <tr>
                                                <td>
                                                    <span><i class="{{ $item->category_icon }}"></i></span>
                                                </td>
                                                <td>{{ $item->category_name_en }}</td>
                                                <td>{{ $item->category_name_bn }}</td>
                                                <td>
                                                    <a href="{{ url('admin/category-edit/' . $item->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ url('admin/category-delete/' . $item->id) }}"
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
                        <div class="card-header">Add New Category</div>
                        <div class="card-body">
                            <form action="{{ route('category-store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-control-label">Category Icon:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="category_icon"
                                        value="{{ old('category_icon') }}" placeholder="Enter Your category Icon">
                                    @error('category_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Category Name English:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="category_name_en"
                                        value="{{ old('category_name_en') }}" placeholder="Enter category_name_en">
                                    @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Category Name Bangla:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="category_name_bn"
                                        value="{{ old('category_name-bn') }}" placeholder="Enter category_name_bn">
                                    @error('category_name_bn')
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
