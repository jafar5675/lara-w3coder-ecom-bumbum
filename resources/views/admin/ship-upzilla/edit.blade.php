@extends('layouts.admin-master')
@section('shipping')
    active show-sub
@endsection
@section('add-district')
    active
@endsection

@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Upzilla</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">

                <div class="col-md-6 m-auto">
                    <div class="card">
                        <div class="card-header">Update UPzilla</div>
                        <div class="card-body">
                            <form action="{{ route('upzilla-update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $upzilla->id }}">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Select Division:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control select2-show-search" name="division_id"
                                        data-placeholder="Select one">
                                        <option label="Choose one"></option>
                                        @foreach ($divisions as $division)
                                            <option
                                                value="{{ $division->id }}"{{ $division->id == $upzilla->division_id ? 'selected' : '' }}>
                                                {{ ucwords($division->division_name) }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Select District:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="district_name"
                                        value="{{ $upzilla->district->district_name }}" placeholder="Enter your district"
                                        readonly>
                                    @error('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Upzilla Name:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="upzilla_name"
                                        value="{{ $upzilla->upzilla_name }}">
                                    @error('upzilla_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Update Upzilla</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
