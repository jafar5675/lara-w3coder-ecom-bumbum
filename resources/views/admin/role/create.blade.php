@extends('layouts.admin-master')

@section('admin-content')
@section('role')
    active show-sub
@endsection
@section('add-role')
    active
@endsection


@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-8 m-auto">
                    <div class="card">
                        <div class="card-header">Add New role</div>
                        <div class="card-body">
                            <form action="{{ route('role.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-control-label">Role Name:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        placeholder="Enter name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Add New Role</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
