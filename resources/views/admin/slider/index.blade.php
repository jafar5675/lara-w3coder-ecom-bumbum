@extends('layouts.admin-master')

@section('sliders')
    active
@endsection

@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Sliders</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Slider List</div>
                        <div class="card-body">

                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-25p"> Image</th>
                                            <th class="wd-20p">Title Eng</th>
                                            <th class="wd-15p">Descrip En</th>
                                            <th class="wd-20p">Status</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($item->image) }}" alt="picture" style="width:50px;">
                                                </td>
                                                <td>
                                                    @if ($item->title_en == null)
                                                        <span class="badge badge-pill badge-danger">No Title</span>
                                                    @else
                                                        {{ $item->title_en }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->description_en == null)
                                                        <span class="badge badge-pill badge-danger">No Description</span>
                                                    @else
                                                        {{ $item->description_en }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">InActive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/slider-edit/' . $item->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ url('admin/slider/delete/' . $item->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fa fa-trash"></i></a>

                                                    @if ($item->status == 1)
                                                        <a href="{{ url('admin/slider-inactive/' . $item->id) }}"
                                                            class="btn btn-danger btn-sm" title="inactive"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ url('admin/slider-active/' . $item->id) }}"
                                                            class="btn btn-success btn-sm" title="active"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
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
                        <div class="card-header">Add New Slider</div>
                        <div class="card-body">
                            <form action="{{ route('slider-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-control-label">Slider:Title English
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="title_en" value="{{ old('title_en') }}"
                                        placeholder="Enter Slider Title">

                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Slider:Title Bangla
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="title_bn" value="{{ old('title_bn') }}"
                                        placeholder="Enter Slider Title Bangla">

                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Slider:Description Eng
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="description_en"
                                        value="{{ old('description_en') }}" placeholder="Enter slider description Eng">

                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Slider:Description Bng
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="description_bn"
                                        value="{{ old('description_bn') }}" placeholder="Enter slider description Bng">

                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Slider Image:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
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
