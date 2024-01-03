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
            <span class="breadcrumb-item active">District</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">

                <div class="col-md-6 m-auto">
                    <div class="card">
                        <div class="card-header">Update District</div>
                        <div class="card-body">
                            <form action="{{ route('district-update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $district->id }}">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Select Division:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control select2-show-search" name="division_id"
                                        data-placeholder="Select one">
                                        <option label="Choose one"></option>
                                        @foreach ($divisions as $division)
                                            <option
                                                value="{{ $division->id }}"{{ $division->id == $district->division_id ? 'selected' : '' }}>
                                                {{ ucwords($division->division_name) }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">District Name:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="district_name"
                                        value="{{ $district->district_name }}">
                                    @error('district_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Add District</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
