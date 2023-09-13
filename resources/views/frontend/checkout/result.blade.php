@extends('frontend.layout.master')
@section('title', 'Thanh toán thành công')
@section('body')
 <!-- Breadcrumb Section Begin -->
 <div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="./"><i class="fa fa-home"></i> Trang chủ</a>
                    <a href="./shop">Shop</a>
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
            <div class="col-lg-12">
                <h4>
                    {{$notification}}
                </h4>
                <a href="./" class="primary-btn mt-5">Tiếp tục mua sắm</a>
            </div>
        </div>
    </div>
</div>
<!-- Shopping Cart Section End -->

@endsection