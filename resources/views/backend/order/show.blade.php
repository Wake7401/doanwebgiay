@extends('backend.layout.master')
@section('title', 'Thông tin đơn hàng')
@section('body')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="./admin/dashboard" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                    <a href="./admin/order" class="breadcrumb-item">Danh sách đơn hàng</a>
                    <span class="breadcrumb-item active">Chi tiết đơn hàng</span>
                </nav>
            </div>
        </div>
        <div class="container-fluid">
            <div class="tab-content m-t-15">
                <div class="tab-pane fade show active" id="product-overview">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách sản phẩm</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Đơn giá</th>
                                            <th scope="col">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order-> orderDetails as $orderDetail)
                                        <tr>
                                            <td><div class="d-flex align-items-center">
                                                <img class="img-fluid rounded"
                                                    src="/frontend/img/products/{{$orderDetail -> product -> productImages[0] -> path}}"
                                                    style="max-width: 60px" alt="">
                                                <h6 class="m-b-0 m-l-10">{{ $orderDetail -> product -> name }}</h6>
                                            </div></td>
                                            <td>{{$orderDetail -> qty}}</td>
                                            <td>{{number_format($orderDetail -> amount)}}đ</td>
                                            <td>{{number_format($orderDetail -> total)}}đ</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="tab-content m-t-15">
                <div class="tab-pane fade show active" id="product-overview">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin đơn hàng</h4>
                            <div class="table-responsive">
                                <table class="product-info-table m-t-20">
                                    <tbody>
                                        <tr>
                                            <td>Tên khách hàng</td>
                                            <td class="text-dark font-weight-semibold">
                                                {{ $order->first_name . ' ' . $order->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Emaill</td>
                                            <td class="text-dark font-weight-semibold">{{ $order->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td class="text-dark font-weight-semibold">{{ $order->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Thanh toán</td>
                                            @if ($order->payment_type === 'pay_later')
                                                <td class="text-dark font-weight-semibold">Thanh toán khi nhận hàng</td>
                                            @else
                                                <td class="text-dark font-weight-semibold">Thanh toán online</td>
                                            @endif
                                        </tr>

                                        <tr>
                                            <td>Trạng thái đơn hàng</td>
                                            <td class="text-dark font-weight-semibold">
                                                {{ \App\Utilities\Constant::$order_status[$order->status] }}</td>
                                        </tr>

                                        <tr>
                                            <td>Mô tả:</td>
                                            <td class="text-dark font-weight-semibold">
                                                <p>{{ $order->description }}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection
