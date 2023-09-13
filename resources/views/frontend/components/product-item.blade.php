<div class="seller__product-item">
    <img class="seller__product-img"
        src="/frontend/img/products/{{ $product->productImages[0]->path ?? 'default-product.jpg'}}" alt="">
    <span class="seller__product-name">{{ $product->name }}</span>
    <span class="seller__product-price">Giá: {{ number_format($product->price, 0, '.', '.') }}đ </span>

    @if ($product->discount != null)
        <span class="seller__product-tag">SALE!</span>
    @endif

    <div class="seller__product-control">
        <div class="overlay--white"></div>

        <a href="cart/add/{{ $product->id }}" class="seller__product-control-btn">
            <i class="seller__product-control-icon fa-solid fa-cart-shopping"></i>
        </a>

        <a href="shop/product/{{ $product->id }}" class="seller__product-control-btn">
            <i class="seller__product-control-icon fa-solid fa-magnifying-glass"></i>
        </a>
    </div>
</div>