<style>
    .search-item-design {
        padding-top: 10px;
    }

    .design-li {
        list-style: none;
        padding: 0 20px;
    }

    .design-li:hover {
        background: #F3F3F3;
        cursor: pointer;
    }

    .design-li a:hover {
        color: #333333;
    }
</style>

<ul class="search-item-design">
    @forelse ($products as $product)
        <a href="{{ url('single/product/' . $product->id . '/' . $product->product_slug_en) }}">
            <li class="design-li">
                <img src="{{ asset($product->product_thumbnail) }}" height="40px" width="40px" alt="">
                <strong>{{ $product->product_name_en }}</strong><br>
            </li>
        </a>
    @empty
        <li style="color:red; padding:0 20px;">Product not Found</li>
    @endforelse
</ul>
