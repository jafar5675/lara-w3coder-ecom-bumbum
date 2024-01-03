@extends('layouts.admin-master')
@section('shipping')
    active show-sub
@endsection
@section('add-Division')
    active
@endsection

@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Division</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">

                <div class="col-md-6 m-auto">
                    <div class="card">
                        <div class="card-header">Update Division</div>
                        <div class="card-body">
                            <form action="{{ route('division-update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $division->id }}">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Division Name:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="division_name"
                                        value="{{ $division->division_name }}">
                                    @error('division_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Update Division</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
