@foreach ($products as $product)
    <div class="col-sm-6 col-md-4 wow fadeInUp">
        <div class="products">
            <div class="product">
                <div class="product-image">
                    <div class="image">
                        @if (session()->get('language') == 'bangla')
                            <a href="{{ url('single/product/' . $product->id . '/' . $product->product_slug_bn) }}"><img
                                    src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                        @else
                            <a href="{{ url('single/product/' . $product->id . '/' . $product->product_slug_en) }}"><img
                                    src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                        @endif
                    </div><!-- /.image -->
                    @php
                        $amount = $product->selling_price - $product->discount_price;
                        $discount = ($amount / $product->selling_price) * 100;
                    @endphp

                    <div class="tag new">
                        @if ($product->discount_price == null)
                            <span>
                                @if (session()->get('language') == 'bangla')
                                    নতুন
                                @else
                                    new
                                @endif
                            </span>
                        @else
                            @if (session()->get('language') == 'bangla')
                                {{ bn_price(round($discount)) }}%
                                <span>

                                </span>
                            @else
                                <span>{{ round($discount) }}%</span>
                            @endif
                        @endif
                    </div>
                </div><!-- /.product-image -->
                <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">
                            @if (session()->get('language') == 'bangla')
                                {{ $product->product_name_bn }}
                            @else
                                {{ $product->product_name_en }}
                            @endif
                        </a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    <div class="product-price">
                        @if ($product->discount_price == null)
                            @if (session()->get('language') == 'bangla')
                                <span class="price">
                                    ${{ bn_price($product->selling_price) }}
                                </span>
                            @else
                                <span class="price">
                                    ${{ $product->selling_price }}
                                </span>
                            @endif
                        @else
                            @if (session()->get('language') == 'bangla')
                                <span class="price">
                                    ${{ bn_price($product->discount_price) }}
                                </span>
                                <span class="price-before-discount">
                                    ${{ bn_price($product->selling_price) }}
                                </span>
                            @else
                                <span class="price">
                                    ${{ $product->discount_price }}
                                </span>
                                <span class="price-before-discount">
                                    ${{ $product->selling_price }}
                                </span>
                            @endif
                        @endif
                    </div><!-- /.product-price -->
                </div><!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                                <button id="{{ $product->id }}" class="btn btn-primary icon" type="button"
                                    title="Add Cart" data-toggle="modal" data-target="#cartModal"
                                    onclick="productView(this.id)">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to
                                    cart</button>

                            </li>
                            <button class="btn btn-primary icon" title="Add To Wishlist" type="button"
                                id="{{ $product->id }}" onclick="addToWishlist(this.id)"><i
                                    class="icon fa fa-heart"></i></button>
                        </ul>
                    </div><!-- /.action -->
                </div><!-- /.cart -->
            </div><!-- /.product -->
        </div><!-- /.products -->
    </div><!-- /.item -->
@endforeach
