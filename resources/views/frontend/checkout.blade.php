@extends('layouts.frontend-master')
@section('content')

@section('title')
    Checkout
@endsection
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <form class="register-form" role="form" action="{{ route('user.checkout.store') }}" method="POST">
                        @csrf
                        <div class="col-md-7">
                            <div class="panel-group checkout-steps" id="accordion">
                                <!-- checkout-step-01  -->
                                <div class="panel panel-default checkout-step-01">
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <!-- panel-body  -->
                                        <div class="panel-body">
                                            <div class="row">
                                                <!-- already-registered-login -->
                                                <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <h4 class="checkout-subtitle">Shipping Address</h4>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Name
                                                            <span>*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            name="shipping_name" id="exampleInputEmail1"
                                                            data-validation="required" placeholder="Full Name"
                                                            value="{{ Auth::user()->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Email
                                                            <span>*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            name="shipping_email" id="exampleInputEmail1"
                                                            data-validation="required" placeholder="User Email"
                                                            value="{{ Auth::user()->email }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Phone
                                                            <span>*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            name="shipping_phone" id="exampleInputEmail1"
                                                            data-validation="required" placeholder="User Phone"
                                                            value="{{ Auth::user()->phone }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Post Code
                                                            <span>*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            name="post_code" id="exampleInputEmail1"
                                                            data-validation="required" placeholder="User Post Code">
                                                    </div>

                                                </div>
                                                <!-- already-registered-login -->
                                                <!-- already-registered-login -->
                                                <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Select Division:
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <select class="form-control select2-show-search" name="division_id"
                                                            data-validation="required" data-placeholder="Select one">
                                                            <option label="Choose one"></option>
                                                            @foreach ($divisions as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ ucwords($item->division_name) }}
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
                                                        <select class="form-control select2-show-search" name="district_id"
                                                            data-validation="required" data-placeholder="Select one">
                                                            <option label="Choose one"></option>
                                                        </select>
                                                        @error('district_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Select Upzilla:
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <select class="form-control select2-show-search" name="upzilla_id"
                                                            data-validation="required" data-placeholder="Select one">
                                                            <option label="Choose one"></option>
                                                        </select>
                                                        @error('upzilla_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Notes
                                                            <span>*</span></label>
                                                        <textarea name="notes" class="form-control" id="" cols="30" rows="5" placeholder="User Notes"
                                                            data-validation="required"></textarea>
                                                    </div>

                                                </div>
                                                <!-- already-registered-login -->

                                            </div>
                                        </div>
                                        <!-- panel-body  -->

                                    </div><!-- row -->
                                </div>
                                <!-- checkout-step-01  -->


                            </div><!-- /.checkout-steps -->
                        </div>
                        <div class="col-md-5">
                            <!-- checkout-progress-sidebar -->
                            <div class="checkout-progress-sidebar ">
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                        </div>
                                        <div class="">
                                            <ul class="nav nav-checkout-progress list-unstyled">
                                                @foreach ($carts as $item)
                                                    <li>
                                                        <strong>Image:</strong>
                                                        <img src="{{ asset($item->options->image) }}" alt=""
                                                            style="height:50px;width:50px;">
                                                        <strong>Qty:</strong>
                                                        {{ $item->qty }}
                                                        <strong>Color:</strong>
                                                        {{ $item->options->color }}
                                                        <strong>Size:</strong>
                                                        {{ $item->options->size }}
                                                    </li>
                                                @endforeach
                                                <hr>
                                                <li>
                                                    @if (Session::has('coupon'))
                                                        <strong>SubTotal:</strong>${{ $cartTotal }}
                                                        <strong>Cupon
                                                            Name:</strong>{{ session()->get('coupon')['coupon_name'] }}({{ session()->get('coupon')['discount_amount'] }}%)<br>
                                                        <strong>Cupon
                                                            Discount:</strong>-
                                                        ${{ session()->get('coupon')['discount_amount'] }}<br>
                                                        <strong>GrandTotal:</strong>${{ session()->get('coupon')['total_amount'] }}
                                                    @else
                                                        <strong>SubTotal:</strong>{{ $cartTotal }}<br />
                                                        <strong>GrandTotal:</strong>{{ $cartTotal }}
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- checkout-progress-sidebar -->
                        </div>
                        <div class="col-md-5">
                            <!-- checkout-progress-sidebar -->
                            <div class="checkout-progress-sidebar ">
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                        </div>
                                        <div class="">
                                            <ul class="nav nav-checkout-progress list-unstyled">
                                                <li>
                                                    <input type="radio" name="payment_method" value="stripe">
                                                    <label for="">Stripe</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="payment_method" value="sslHost">
                                                    <label for="">SSL HostedPayment</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="payment_method" value="sslEasy">
                                                    <label for="">SSL EasyPament</label>
                                                </li>
                                                <button type="submit"
                                                    class="btn-upper btn btn-primary checkout-page-button pull-right">Payment
                                                    Step</button>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- checkout-progress-sidebar -->
                        </div>
                    </form>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
        </div><!-- /.container -->
    </div><!-- /.body-container -->

    <script src="{{ asset('backend') }}/lib/jquery/jquery.js"></script>

    <script type="text/javascript">
        // district
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('/user/district-get/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="upzilla_id"]').empty();
                            $('select[name="district_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            // upzilla
            $('select[name="district_id"]').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{ url('/user/upzilla-get/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="upzilla_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="upzilla_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .upzilla_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
