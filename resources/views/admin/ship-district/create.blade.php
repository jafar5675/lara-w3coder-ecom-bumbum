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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">District List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-30p">Division Name</th>
                                            <th class="wd-30p">District Name</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($districts as $item)
                                            <tr>
                                                <td>{{ $item->division->division_name }}</td>
                                                <td>{{ $item->district_name }}</td>
                                                <td>
                                                    <a href="{{ url('admin/district-edit/' . $item->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ url('admin/district-delete/' . $item->id) }}"
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
                        <div class="card-header">Add New District</div>
                        <div class="card-body">
                            <form action="{{ route('district-store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-control-label">Select Division:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control select2-show-search" name="division_id"
                                        data-placeholder="Select one">
                                        <option label="Choose one"></option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ ucwords($division->division_name) }}
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
                                        value="{{ old('district_name') }}" placeholder="Enter Your District">
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
