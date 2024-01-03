@extends('layouts.admin-master')

@section('admin-content')
@section('stock')
    active
@endsection

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-brudcrumb">
        <a href="index.html" class="breadcrumb-item">Ecom Shop</a>
        <span class="breadcrumb-item active">UPdate Stock</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">UPdate Product Quantity</h6>
            <form action="{{ route('stock-update', $product->id) }}" method="POST">
                @csrf
                <div class="row row-sm">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Name English:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="product_name_en"
                                value="{{ $product->product_name_en }}" placeholder="Enter product_name_en">
                            @error('product_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Code:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="product_code"
                                value="{{ $product->product_code }}" placeholder="Enter product_code">
                            @error('product_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-control-label">Product Quantity:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="product_qty"
                                value="{{ $product->product_qty }}" placeholder="Enter product_qty">
                            @error('product_qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-layout footer mt-3">
                    <button class="btn btn-info mg-r-5" type="submit" style="cursor:pointer">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
