@extends('frontend.layout.master')
@section('title', 'Đơn hàng')
@section('body')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Đơn hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Chi tiết</th>
                            </tr>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="cart-pic first-row">
                                            <img style="width: 100px;margin-left:60px;"
                                                src="/frontend/img/products/{{ $order->orderDetails[0]->product->productImages[0]->path }}"
                                                alt="">
                                        </td>
                                        <td class="first-row" style="font-size: 16px;">
                                            #{{$order->id}}
                                        </td>
                                        <td class="cart-title first-row text-center">
                                            <h5>{{$order -> orderDetails[0] -> product -> name}}
                                                @if(count($order -> orderDetails) > 1)
                                                (và {{count($order -> orderDetails)}} sản phẩm khác)
                                                @endif
                                            </h5>
                                        </td>
                                        <td class="total-price first-row">
                                            <?php echo number_format(array_sum(array_column($order->orderDetails->toArray(), 'total')), 0, ',', '.') ?>đ
                                        </td>                                        
                                        <td class="first-row">
                                            <a class="btn" style="font-size: 16px;" href="./account/my-order/{{$order->id}}">Chi tiết</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
