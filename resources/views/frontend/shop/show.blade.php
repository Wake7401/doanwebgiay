@extends('frontend.layout.master')
@section('title', $product -> name)
@section('body')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop"> Shop</a>
                        <span>{{ $product->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.shop.components.products-sidebar-filter')
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img src="/frontend/img/products/{{ $product->productImages[0]->path }}"
                                    class="product-big-img" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @foreach ($product->productImages as $productImage)
                                        <div class="pt active"
                                            data-imgbigurl="/frontend/img/products/{{  $productImage-> path ?? ''}}">
                                            <img src="/frontend/img/products/{{  $productImage-> path ?? ''}}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <h3>{{ $product->name }}</h3>
                                </div>
                                <div class="pd-rating">
                                    @for ($i = 0; $i <= 5; $i++)
                                        @if ($i <= $product->avgRating)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                                    <span>({{ count($product->productComments) }})</span>
                                </div>
                                <div class="pd-desc">
                                    <p>{{ $product->content }}</p>
                                    @if ($product->discount != null)
                                        <h4>Giá: {{ number_format($product->price, 0, '.', '.') }}đ <span>{{ number_format($product->discount, 0, '.', '.') }}đ</span></h4>
                                    @else
                                        <h4>Giá: {{ number_format($product->price, 0, '.', '.') }}đ </h4>
                                    @endif
                                </div>

                                <div class="pd-color">
                                    <h6>Màu sắc</h6>
                                    <div class="pd-color-choose">
                                        @foreach (array_unique(array_column($product->productDetails->toArray(), 'color')) as $productColor)
                                            <div class="cc-item">
                                                <input type="radio" id="cc-{{ $productColor }}">
                                                <label for="cc-{{ $productColor }}"
                                                    class="cc-{{ $productColor }}"></label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="pd-size-choose">
                                    @foreach (array_unique(array_column($product->productDetails->toArray(), 'size')) as $productSize)
                                        <div class="sc-item">
                                            <input type="radio" id="sm-{{ $productSize }}">
                                            <label for="sm-{{ $productSize }}">{{ $productSize }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                        <a href="cart/add/{{ $product->id }}" class="primary-btn pd-cart">Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>Danh mục</span>: {{ $product->productCategory->name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li><a href="#tab-1" data-toggle="tab" role="tab">Mô tả</a></li>
                                <li><a href="#tab-2" data-toggle="tab" role="tab">Thông số</a></li>
                                <li><a href="#tab-3" data-toggle="tab" role="tab">Đánh giá
                                        ({{ count($product->productComments) }})</a></li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Đánh giá của khách hàng</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        @for ($i = 0; $i <= 5; $i++)
                                                            @if ($i <= $product->avgRating)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor
                                                        <span>({{ count($product->productComments) }})</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">giá</td>
                                                <td>
                                                    <div class="p-price">
                                                        {{ number_format($product->price, 0, '.', '.') }}đ 
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Kho hàng</td>
                                                <td>
                                                    <div class="p-stock">{{ $product->qty }} sản phẩm</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{ count($product->productComments) }} Bình luận</h4>
                                        <div class="comment-option">
                                            @foreach ($product->productComments as $productComment)
                                                <div class="co-item">
                                                    <div class="avatar-pic">
                                                        <img src="/frontend/img/user/{{ $productComment->user->avatar ?? 'default-avatar.jpg' }}"
                                                            alt="">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            @for ($i = 0; $i <= 5; $i++)
                                                                @if ($i <= $productComment->rating)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <h5>{{ $productComment->name }}

                                                            <span><?php
                                                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                                                            echo date('d/m/Y', strtotime($productComment->created_at));
                                                            ?></span>
                                                        </h5>
                                                        <div class="at-reply">{{ $productComment->messages }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Để lại bình luận</h4>
                                            <form action="" class="comment-form" method="POST">
                                                @csrf

                                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                                <input type="hidden" name="user_id"
                                                    value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? null }}" />
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Tên của bạn" name="name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email" name="email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Nội dung" name="messages"></textarea>

                                                        <div class="personal-rating">
                                                            <h6>Đánh giá của bạn</h6>
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rating"
                                                                    value="5" />
                                                                <label for="star5" title="text">5 sao</label>
                                                                <input type="radio" id="star4" name="rating"
                                                                    value="4" />
                                                                <label for="star4" title="text">4 sao</label>
                                                                <input type="radio" id="star3" name="rating"
                                                                    value="3" />
                                                                <label for="star3" title="text">3 sao</label>
                                                                <input type="radio" id="star2" name="rating"
                                                                    value="2" />
                                                                <label for="star2" title="text">2 sao</label>
                                                                <input type="radio" id="star1" name="rating"
                                                                    value="1" />
                                                                <label for="star1" title="text">1 sao</label>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="site-btn">Gửi</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section Begin -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProduct as $product)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item product-item-border">
                            <div class="pi-pic pi-pic-border">
                                <img src="/frontend/img/products/{{ $product->productImages[0]->path }}"
                                    alt="">
                                @if ($product->discount != null)
                                    <div class="sale pp-sale">Sale</div>
                                @endif
                                <ul>
                                    <li class="w-icon active"><a href="cart/add/{{ $product->id }}"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="shop/product/{{ $product->id }}">Xem sản phẩm</a>
                                    </li>
                                    <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <a href="shop/product/{{ $product->id }}">
                                    <h5>{{ $product->name }}</h5>
                                </a>
                                <div class="product-price">
                                    {{ number_format($product->price, 0, '.', '.') }}đ 
                                    <span>{{ number_format($product->discount, 0, '.', '.') }}đ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->

@endsection
