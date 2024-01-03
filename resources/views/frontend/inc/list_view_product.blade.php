@foreach ($products as $product)
    <div class="category-product-inner wow fadeInUp">
        <div class="products">
            <div class="product-list product">
                <div class="row product-list-row">
                    <div class="col col-sm-4 col-lg-4">
                        <div class="product-image">
                            <div class="image">
                                @if (session()->get('language') == 'bangla')
                                    <a
                                        href="{{ url('single/product/' . $product->id . '/' . $product->product_slug_bn) }}"><img
                                            src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                @else
                                    <a
                                        href="{{ url('single/product/' . $product->id . '/' . $product->product_slug_en) }}"><img
                                            src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                @endif
                            </div>
                        </div><!-- /.product-image -->
                    </div><!-- /.col -->
                    <div class="col col-sm-8 col-lg-8">
                        <div class="product-info">
                            <h3 class="name"><a href="detail.html">
                                    @if (session()->get('language') == 'bangla')
                                        {{ $product->product_name_bn }}
                                    @else
                                        {{ $product->product_name_en }}
                                    @endif
                                </a></h3>
                            <div class="rating rateit-small"></div>
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
                            <div class="description m-t-10">{!! $product->short_descp_en !!}
                            </div>
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                <i class="fa fa-shopping-cart"></i>
                                            </button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to
                                                cart</button>

                                        </li>

                                        <li class="lnk wishlist">
                                            <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                <i class="icon fa fa-heart"></i>
                                            </a>
                                        </li>

                                        <li class="lnk">
                                            <a class="add-to-cart" href="detail.html" title="Compare">
                                                <i class="fa fa-signal"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- /.action -->
                            </div><!-- /.cart -->

                        </div><!-- /.product-info -->
                    </div><!-- /.col -->
                </div><!-- /.product-list-row -->
                <div class="tag new">
                    @if ($product->discount_price == null)
                        @if (session()->get('language') == 'bangla')
                            <span>

                                নতুন
                            </span>
                        @else
                            <span>
                                new
                            </span>
                        @endif
                    @else
                        @if (session()->get('language') == 'bangla')
                            <span>
                                {{ bn_price(round($discount)) }}%
                            </span>
                        @else
                            {{-- <span>{{ round($discount) }}%</span> --}}
                        @endif
                    @endif
                </div>
            </div><!-- /.product-list -->
        </div><!-- /.products -->
    </div><!-- /.category-product-inner -->
@endforeach
