@extends('layouts.admin-master')

@section('coupon')
    active
@endsection

@section('admin-content')
    {{-- ==============Start main Panel======== --}}

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-brudcrumb">
            <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
            <span class="breadcrumb-item active">Coupon</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Coupon List</div>
                        <div class="card-body">

                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-20p">Coupon N</th>
                                            <th class="wd-15p">Coup Dis</th>
                                            <th class="wd-20p">Validity</th>
                                            <th class="wd-20p">Status</th>
                                            <th class="wd-15p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $item)
                                            <tr>
                                                <td>{{ $item->coupon_name }}</td>
                                                <td>{{ $item->coupon_discount }}%</td>
                                                <td>
                                                    {{ Carbon\Carbon::parse($item->coupon_validity)->format('d F Y') }}
                                                    {{-- {{ $item->coupon_validity }} --}}
                                                </td>
                                                <td>
                                                    @if ($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                                        <span class="badge badge-pill badge-success">Valid</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Invalid</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/coupon-edit/' . $item->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ url('admin/coupon-delete/' . $item->id) }}"
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
                        <div class="card-header">Add New Coupon</div>
                        <div class="card-body">
                            <form action="{{ route('coupon-store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-control-label">Coupon Name:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="coupon_name"
                                        value="{{ old('coupon_name') }}" placeholder="Enter coupon_name">
                                    @error('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Coupon Discount:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="coupon_discount"
                                        value="{{ old('coupon_discount') }}" placeholder="Enter coupon_discount"
                                        min="1" max="99">
                                    @error('coupon_discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Coupon Validity:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" class="form-control" name="coupon_validity"
                                        value="{{ old('coupon_validity') }}"
                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    @error('coupon_validity')
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
