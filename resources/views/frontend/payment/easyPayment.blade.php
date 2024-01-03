@extends('layouts.frontend-master')
@section('content')

@section('title')
    SSL Easy Payment
@endsection
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Easy Payment</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                            <span class="badge badge-secondary badge-pill">3</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @foreach ($carts as $item)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{ $item->name }}</h6>
                                        <small class="text-muted">{{ $item->options->color }}</small><br>
                                        <small class="text-muted">{{ $item->options->size }}</small>
                                    </div>
                                    <span class="text-muted">Tk-{{ $item->price }}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (BDT)</span>
                                <strong>{{ $total_amount }} TK</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <form method="POST" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Full name</label>
                                    <input type="text" name="customer_name" class="form-control" id="customer_name"
                                        placeholder="" value="{{ $data['shipping_name'] }}" disabled required>
                                    <div class="invalid-feedback">
                                        Valid customer name is required.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="mobile">Mobile</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+88</span>
                                    </div>
                                    <input type="text" name="customer_mobile" class="form-control" id="mobile"
                                        placeholder="Mobile" value="{{ $data['shipping_phone'] }}" disabled required>
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Your Mobile number is required.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                <input type="email" name="customer_email" class="form-control" id="email"
                                    placeholder="you@example.com" value="{{ $data['shipping_email'] }}" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <hr class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address">
                                <input type="hidden" value="{{ $total_amount }}" name="amount" id="total_amount"
                                    required />
                                <input type="hidden" name="post_code" id="post_code" value="{{ $data['post_code'] }}">
                                <input type="hidden" name="division_id" id="division_id"
                                    value="{{ $data['division_id'] }}">
                                <input type="hidden" name="district_id" id="district_id"
                                    value="{{ $data['district_id'] }}">
                                <input type="hidden" name="upzilla_id" id="upzilla_id" value="{{ $data['upzilla_id'] }}">
                                <input type="hidden" name="notes" id="notes" value="{{ $data['notes'] }}">
                                <label class="custom-control-label" for="same-address">Shipping address is the same as my
                                    billing
                                    address</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info">
                                <label class="custom-control-label" for="save-info">Save this information for next
                                    time</label>
                            </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                                token="if you have any token validation"
                                postdata="your javascript arrays or objects which requires in backend"
                                order="If you already have the transaction generated for current order"
                                endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script> --}}


@endsection
