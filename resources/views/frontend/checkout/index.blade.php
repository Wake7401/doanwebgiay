@extends('frontend.layout.master')
@section('title', 'Thanh toán')
@section('body')
 <!-- Breadcrumb Section Begin -->
 <div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="./"><i class="fa fa-home"></i> Trang chủ</a>
                    <a href="./cart">Giỏ hàng</a>
                    <span>Thanh toán</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<div class="checkout-section spad">
    <div class="container">
        <div class="row">
            <form action="" method="POST" class="checkout-form">
                @csrf
                <div class="row">
                    @if (Cart::count() > 0)
                    <div class="col-lg-6">
                        <h4>Thông tin thanh toán</h4>
                        <div class="row">

                            <input type="hidden" id="user_id" name="user_id" value="{{Auth::user() -> id ?? ''}}">

                            <div class="col-lg-6">
                                <label for="fir">Họ <span>*</span></label>
                                <input type="text" id="fir" name="first_name">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Tên <span>*</span></label>
                                <input type="text" id="last" name="last_name" value="{{Auth::user() -> name ?? ''}}">
                            </div>
                            
                            <div class="col-lg-12">
                                <label for="street">Địa chỉ <span>*</span></label>
                                <input type="text" id="street" class="street-first" name="address" value="{{Auth::user() -> address ?? ''}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email <span>*</span></label>
                                <input type="text" id="email" name="email" value="{{Auth::user() -> email ?? ''}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">SĐT <span>*</span></label>
                                <input type="text" id="phone" name="phone" value="{{Auth::user() -> phone ?? ''}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Đơn hàng của bạn</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Sản phẩm <span>Tổng cộng</span></li>
                                    @foreach ($carts as $cart)
                                    <li class="fw-normal">{{$cart -> name}} x {{$cart -> qty}} <span>{{ number_format($cart->price * $cart->qty, 0, '.', '.') }}đ</span></li>
                                    @endforeach
                                    <li class="total-price">Tổng cộng  <span>{{ $total }}đ</span></li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Thanh toán khi nhận hàng
                                            <input type="radio" name="payment_type" value="pay_later" id="pc-check" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Thanh toán online
                                            <input type="radio" name="payment_type" value="online_payment" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-12 text-center">
                        <h5 style="margin-left: 400px">Bạn chưa chọn sản phẩm.</h5>
                        <img src="frontend/img/giohangtrong2.png" alt="" style="margin-left: 400px">
                        <h5 style="margin-left: 400px">Hãy nhanh tay chọn ngay sản phẩm yêu thích.</h5>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Shopping Cart Section End -->

@endsection