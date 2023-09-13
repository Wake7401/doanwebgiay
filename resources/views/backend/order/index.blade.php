@extends('backend.layout.master')
@section('title', 'Danh sách đơn hàng')
@section('body')

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="./admin/dashboard" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <span class="breadcrumb-item active">Danh sách đơn hàng</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row m-b-30">
                <div class="col-lg-8">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover e-commerce-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Tổng đơn hàng</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    #{{ $order->id }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid rounded"
                                            src="/frontend/img/products/{{ $order->orderDetails[0]->product ->productImages[0]-> path ?? '' }}"
                                            style="max-width: 60px" alt="">
                                        <h6 class="m-b-0 m-l-10">{{ $order->first_name.' '.$order->last_name }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="m-b-0 m-l-10">{{$order->address}}</h6>
                                </td>
                                <td>
                                    <h6 class="m-b-0 m-l-10">{{ number_format(array_sum(array_column($order->orderDetails->toArray(),'total')), 0, '', ',') }}đ</h6>
                                </td>
                                <td>
                                    <div class="badge badge-pill badge-success text-center">
                                        <h6 class="m-b-0 m-l-10">{{\App\Utilities\Constant::$order_status[$order->status]}}</h6>
                                    </div>
                                </td>                         
                                <td class="text-right">
                                    <a href="./admin/order/{{ $order->id }}" 
                                        class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="fas fa-align-justify" title="Xem chi tiết"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Content Wrapper END -->
@endsection