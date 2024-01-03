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

                <div class="col-md-6 m-auto">
                    <div class="card">
                        <div class="card-header">Update Coupon</div>
                        <div class="card-body">
                            <form action="{{ route('coupon-update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $coupon->id }}">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Coupon Name:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="coupon_name"
                                        value="{{ $coupon->coupon_name }}" placeholder="Enter coupon_name">
                                    @error('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Coupon Discount:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="coupon_discount"
                                        value="{{ $coupon->coupon_discount }}" placeholder="Enter coupon_discount"
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
                                        value="{{ $coupon->coupon_validity }}"
                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    @error('coupon_validity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info">Update Coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
