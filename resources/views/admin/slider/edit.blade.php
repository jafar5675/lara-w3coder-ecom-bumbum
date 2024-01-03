@extends('layouts.admin-master')

@section('sliders')
    active
@endsection

@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Slider</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Add New Slider</div>
                        <div class="card-body">
                            <form action="{{ route('update-slider') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $slider->image }}">
                                <input type="hidden" name="id" value="{{ $slider->id }}">
                                <div class="row row-sm">
                                    @if ($slider->title_en == null)
                                    @else
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Slider:Title English
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="title_en"
                                                    value="{{ $slider->title_en }}" placeholder="Enter Slider Title">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Slider:Title Bangla
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="title_bn"
                                                    value="{{ $slider->title_bn }}" placeholder="Enter Slider Title Bangla">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Slider:Description Eng
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="description_en"
                                                    value="{{ $slider->description_en }}"
                                                    placeholder="Enter slider description Eng">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Slider:Description Bng
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="description_bn"
                                                    value="{{ $slider->description_bn }}"
                                                    placeholder="Enter slider description Bng">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-control-label">Slider Image:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="file" class="form-control" name="image">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-control-label">Old Image:
                                            </label>
                                            <img src="{{ asset($slider->image) }}" height="60px" width="150px"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="form-layout-footer">
                                        <button type="submit" class="btn btn-info">Add New</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
