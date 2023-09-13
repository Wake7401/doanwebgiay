@extends('frontend.layout.master')
@section('title', 'Shop')
@section('body')

    <!-- Breadcrumb Section Begin  -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End-->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 product-sidebar-filter">
                    @include('frontend.shop.components.products-sidebar-filter')
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <form action="">
                                    <div class="select-option">
                                        <select name="sort_by" onchange="this.form.submit();" class="sorting"
                                            style="display:none; display: block;">
                                            <option {{ request('sort_by') == 'latest' ? 'selected' : '' }} value="latest">
                                                Sắp
                                                xếp: Mới nhất</option>
                                            <option {{ request('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">
                                                Sắp
                                                xếp: Cũ nhất</option>
                                            <option {{ request('sort_by') == 'name-ascending' ? 'selected' : '' }}
                                                value="name-ascending">Sắp xếp: Tên A-Z</option>
                                            <option {{ request('sort_by') == 'name-descending' ? 'selected' : '' }}
                                                value="name-descending">Sắp xếp: Tên Z-A</option>
                                            <option {{ request('sort_by') == 'price-ascending' ? 'selected' : '' }}
                                                value="price-ascending">Sắp xếp: Giá tăng dần</option>
                                            <option {{ request('sort_by') == 'price-descending' ? 'selected' : '' }}
                                                value="price-descengding">Sắp xếp: Giảm dần</option>
                                        </select>
                                        <select name="show" onchange="this.form.submit();" class="p-show">
                                            <option {{ request('show') == '3' ? 'selected' : '' }} value="3">Xem: 3
                                            </option>
                                            <option {{ request('show') == '6' ? 'selected' : '' }} value="9">Xem: 8
                                            </option>
                                            <option {{ request('show') == '9' ? 'selected' : '' }} value="15">Xem: 15
                                            </option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product list">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="/frontend/img/products/{{ $product->productImages[0]->path }}"
                                                alt="">
                                            @if ($product->discount != null)
                                                <div class="sale pp-sale">SALE</div>
                                            @endif
                                            <ul>
                                                <li class="w-icon active"><a href="cart/add/{{ $product->id }}"><i
                                                            class="icon_bag_alt"></i></a>
                                                </li>
                                                <li class="quick-view"><a href="shop/product/{{ $product->id }}">Xem
                                                        thêm</a></li>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <a href="shop/product/{{ $product->id }}">
                                                <h5>{{ $product->name }}</h5>
                                            </a>
                                            <div class="product-price">
                                                Giá: {{ number_format($product->price, 0, '.', '.') }}đ
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

@endsection
