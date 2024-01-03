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
            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Brand List</div>
                        <div class="card-body">

                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-30p">Brand Image</th>
                                            <th class="wd-25p">Brand Name En</th>
                                            <th class="wd-25p">Brand Name Bn</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($item->brand_image) }}" alt="picture"
                                                        style="width:50px;">
                                                </td>
                                                <td>{{ $item->brand_name_en }}</td>
                                                <td>{{ $item->brand_name_bn }}</td>
                                                <td>
                                                    <a href="{{ url('admin/brand-edit/' . $item->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ url('admin/brand-delete/' . $item->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add New Brand</div>
                        <div class="card-body">
                            <form action="{{ route('brand-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-control-label">Brand Name English:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="brand_name_en"
                                        value="{{ old('brand_name_en') }}" placeholder="Enter brand_name_en">
                                    @error('brand_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Brand Name Bangla:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="brand_name_bn"
                                        value="{{ old('brand_name-bn') }}" placeholder="Enter brand_name_bn">
                                    @error('brand_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Brand Image:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" name="brand_image">
                                    @error('brand_image')
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
