@extends('layouts.frontend-master')
@section('content')

@section('title')
    cart
@endsection
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="shipping-cart">
                    <div class="col-md-12 my-wishlist">
                        <div class="shipping-cart-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="">Image</th>
                                            <th class="">Name</th>
                                            <th class="">color</th>
                                            <th class="">Size</th>
                                            <th class="">Quantity</th>
                                            <th class="">SubTotal</th>
                                            <th class="">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cartPage">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
                <div class="col-md-6 col-sm-12 estimate-ship-tax">
                    @if (Session::has('coupon'))
                    @else
                        <table class="table" id="couponField">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">Discount Code</span>
                                        <p>Enter your coupon code if you have one..</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control unicase-form-control text-input"
                                                id="coupon_name" placeholder="You Coupon..">
                                        </div>
                                        <div class="clearfix pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary"
                                                onclick="applyCoupon()">APPLY
                                                COUPON</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    @endif
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-6 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead id="couponCalField">

                        </thead><!-- /thead -->
                        <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <a href="{{ route('checkout') }}" class="btn btn-primary checkout-btn">PROCCED TO
                                            CHEKOUT</a>
                                        <span class="">Checkout with multiples address!</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->
            </div><!-- /.sigin-in-->

        </div><!-- /.container -->
    </div><!-- /.body-content -->

@endsection
