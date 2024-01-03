<div class="sidebar-widget  wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @php
            $hot_deals = App\Models\Product::where('hot_deals', 1)
                ->where('status', 1)
                ->where('discount_price', '!=', null)
                ->orderBy('id', 'DESC')
                ->get();
        @endphp
        @foreach ($hot_deals as $product)
            <div class="item">

                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image">
                            <a href="{{ url('single/product/' . $product->id . '/' . $product->product_slug_bn) }}">
                                <img src="{{ asset($product->product_thumbnail) }}" alt="" height="100"
                                    width="100">
                            </a>
                        </div>
                        <div class="sale-offer-tag"><span>49%<br>off</span></div>
                        <div class="timing-wrapper">
                            <div class="box-wrapper">
                                <div class="date box">
                                    <span class="key">120</span>
                                    <span class="value">DAYS</span>
                                </div>
                            </div>

                            <div class="box-wrapper">
                                <div class="hour box">
                                    <span class="key">20</span>
                                    <span class="value">HRS</span>
                                </div>
                            </div>

                            <div class="box-wrapper">
                                <div class="minutes box">
                                    <span class="key">36</span>
                                    <span class="value">MINS</span>
                                </div>
                            </div>

                            <div class="box-wrapper hidden-md">
                                <div class="seconds box">
                                    <span class="key">60</span>
                                    <span class="value">SEC</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        {{-- <h3 class="name"><a
                                href="{{ url('single/product/' . $hot->id . '/' . $hot->product_slug_en) }}">Floral
                                Print Buttoned</a> --}}
                        @if (session()->get('language') == 'bangla')
                            <a
                                href="{{ url('single/product/' . $product->id . '/' . $product->product_slug_bn) }}">{{ $product->product_name_bn }}</a>
                        @else
                            <a
                                href="{{ url('single/product/' . $product->id . '/' . $product->product_slug_en) }}">{{ $product->product_name_en }}</a>
                        @endif
                        </h3>
                        @if (App\Models\ProductReview::where('product_id', $product->id)->first())
                            @php
                                // product review
                                $reviewProducts = App\Models\ProductReview::where('product_id', $product->id)
                                    ->where('status', 'approve')
                                    ->latest()
                                    ->get();
                                $rating = App\Models\ProductReview::where('product_id', $product->id)
                                    ->where('status', 'approve')
                                    ->avg('rating');
                                $avgRating = number_format($rating, 1);
                            @endphp
                            @for ($i = 1; $i <= 5; $i++)
                                <span style="color:brown;font-size:15px;"
                                    class="glyphicon glyphicon-star{{ $i <= $avgRating ? '' : '-empty' }}"></span>
                            @endfor
                            ({{ count($reviewProducts) }})
                        @else
                            <span class="text-danger">No Review</span>
                        @endif

                        <div class="product-price">
                            @if ($product->discount_price == null)
                                <span class="price"> {{ $product->selling_price }}
                                </span>
                            @else
                                <span class="price"> {{ $product->discount_price }}
                                </span>
                                <span class="price-before-discount">{{ $product->selling_price }}</span>
                            @endif
                        </div><!-- /.product-price -->

                    </div><!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">

                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                <button class="btn btn-primary cart-btn" type="button" title="Add Cart"
                                    data-toggle="modal" data-target="#cartModal" onclick="productView(this.id)">Add to
                                    cart</button>


                            </div>

                        </div><!-- /.action -->
                    </div><!-- /.cart -->
                </div>

            </div>
        @endforeach

    </div><!-- /.sidebar-widget -->
</div>
