@extends('frontend.layout.master')
@section('title', 'Chi tiết đơn hàng')
@section('body')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Trang chủ</a>
                        <a href="./account/my-order"><i class="fa fa-home"></i> Đơn hàng</a>
                        <span>Chi tiết đơn hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="checkout-section spad">
        <div class="container">
            <form action="" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <div class="content-btn">
                                ID:
                                <b>#{{$order -> id}}</b>
                            </div>
                        </div>
                        <h4>Chi tiết đơn hàng</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Họ *</label>
                                <input type="text" disabled value="{{$order -> first_name}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Tên *</label>
                                <input type="text" disabled value="{{$order -> last_name}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Địa chỉ <span>*</span></label>
                                <input type="text"disabled id="street" class="street-first" name="address" value="{{$order -> address}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email <span>*</span></label>
                                <input type="text" disabled id="email" name="email" value="{{$order -> email}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">SĐT <span>*</span></label>
                                <input type="text" disabled id="phone" name="phone" value="{{$order -> phone}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <div class="content-btn">
                                Trạng thái:
                                <b>{{\App\Utilities\Constant::$order_status[$order->status]}}</b>
                            </div>
                        </div>

                        <div class="place-order">
                            <h4>Đơn hàng của bạn</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Sản phẩm <span>Tổng</span></li>
                                    @foreach ($order -> orderDetails as $orderDetail)
                                    <li class="fw-normal"> {{$orderDetail -> product -> name}} x {{$orderDetail -> qty}} <span> {{ number_format($orderDetail->total, 0, ',', '.') }}đ</span></li>
                                    @endforeach

                                    <li class="total-price">
                                        Tổng <span><?php echo number_format(array_sum(array_column($order->orderDetails->toArray(), 'total')), 0, ',', '.') ?>đ</span>
                                    </li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Thanh toán khi nhận hàng
                                            <input type="radio" name="payment_type" value="pay_later" id="pc-check" {{$order->payment_type == 'pay_later' ? 'checked' : ''}}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Thanh toán online
                                            <input type="radio" name="payment_type" value="online_payment" id="pc-paypal" {{$order->payment_type == 'online_payment' ? 'checked' : ''}}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection