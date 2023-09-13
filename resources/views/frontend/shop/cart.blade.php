@extends('frontend.layout.master')
@section('title', 'Giỏ hàng')
@section('body')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <div class="shopping-cart spad">
        <div class="container">
            <div class="row">
                @if(Cart::count() > 0 )
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th class="p-name">Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th><i class="ti-colse"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr data-rowid="{{ $cart->rowId }}">
                                        <td class="cart-pic first-row"><img
                                                src="frontend/img/products/{{ $cart->options->images[0]->path }}"
                                                alt="" style="width: 100px;margin-left:60px;"></td>
                                        <td class="cart-title first-row">
                                            <h5>{{ $cart->name }}</h5>
                                        </td>
                                        <td class="p-price first-row">{{ number_format($cart->price, 0, '.', '.') }}đ</td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{ $cart->qty }}" data-rowId="{{ $cart->rowId }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">
                                            {{ number_format($cart->price * $cart->qty, 0, '.', '.') }}đ</td>
                                        <td class="close-td first-row"><i onclick="removeCart('{{ $cart->rowId }}')"
                                                class="ti-close"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="shop" class="primary-btn continue-shop">Tiếp tục mua sắm</a>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="cart-total">Tổng cộng <span>{{ $total }}đ</span></li>
                                </ul>
                                <a href="./checkout" class="proceed-btn">TIẾN HÀNH THANH TOÁN</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-12 text-center">
                    <h5>Bạn chưa chọn sản phẩm.</h5>
                    <img src="frontend/img/giohangtrong2.png" alt="" style="margin-left: 400px">
                    <h5>Hãy nhanh tay chọn ngay sản phẩm yêu thích.</h5>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Shopping Cart Section End -->

@endsection
