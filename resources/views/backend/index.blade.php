@extends('backend.layout.master')
@section('title', 'Dashboard')
@section('body')
<!-- Content Wrapper START -->
<div class="main-content">
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-dollar"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{ number_format($orders->flatMap->orderDetails->sum('total'), 0, '', '.') }}đ
                            </h2>
                            <p class="m-b-0 text-muted">Doanh thu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                            <i class="fab fa-product-hunt"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{count($products)}}</h2>
                            <p class="m-b-0 text-muted">Sản phẩm</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                            <i class="anticon anticon-profile"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{count($orders)}}</h2>
                            <p class="m-b-0 text-muted">Đơn hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-purple">
                            <i class="anticon anticon-user"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{count($users)}}</h2>
                            <p class="m-b-0 text-muted">Tài khoản</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Wrapper END -->
@endsection