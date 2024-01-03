@extends('layouts.admin-master')

@section('admin-content')
@section('role')
    active show-sub
@endsection
@section('all-role')
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
                        <div class="card-header">Edit role</div>
                        <div class="card-body">
                            <form action="{{ route('role.update', $role->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="" class="form-control-label">Role Name:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Update Role</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
