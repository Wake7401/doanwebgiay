@extends('backend.layout.master')
@section('title', 'Thông tin sản phẩm')
@section('body')
 <!-- Content Wrapper START -->
 <div class="main-content">
    <div class="page-header no-gutters has-tab">
        <div class="d-md-flex m-b-15 align-items-center justify-content-between">
            <div class="media align-items-center m-b-15">
                @foreach ($product->productImages as $productImage)
                <div class="avatar avatar-image rounded" style="height: 70px; width: 70px; margin-right: 5px;">
                    <img src="/frontend/img/products/{{ $productImage-> path ?? '' }}" alt="">
                </div>
                @endforeach
                <div class="m-l-15">
                    <h4 class="m-b-0">{{ $product->name }}</h4>
                    <p class="text-muted m-b-0">ID: #{{ $product->id }}</p>
                </div>
            </div>
            <div class="m-b-15">
                <a href="./admin/product/{{ $product->id }}/edit" class="btn btn-primary">
                    <i class="anticon anticon-edit"></i>
                    <span>Chỉnh sửa</span>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="tab-content m-t-15">
            <div class="tab-pane fade show active" id="product-overview" >
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thông tin cơ bản</h4>
                        <div class="table-responsive">
                            <table class="product-info-table m-t-20">
                                <tbody>
                                    <tr>
                                        <td>Hình ảnh sản phẩm</td>
                                        <td class="text-dark font-weight-semibold"><a href="./admin/product/{{$product->id}}/image">Quản lí hình ảnh</a></td>
                                    </tr>
                                    <tr>
                                        <td>Thông tin chi tiết sản phẩm</td>
                                        <td class="text-dark font-weight-semibold"><a href="./admin/product/{{$product->id}}/detail">Quản lí size và số lượng sản phẩm</a></td>
                                    </tr>
                                    <tr>
                                        <td>Giá</td>
                                        <td class="text-dark font-weight-semibold">{{ number_format($product->price, 0, '.', '.') }}đ</td>
                                    </tr>
                                    <tr>
                                        <td>Giá giảm</td>
                                        <td class="text-dark font-weight-semibold">{{ number_format($product->discount, 0, '.', '.') }}đ</td>
                                    </tr>
                                    <tr>
                                        <td>Thương hiệu</td>
                                        <td class="text-dark font-weight-semibold">{{ $product->brand -> name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Danh mục</td>
                                        <td class="text-dark font-weight-semibold">{{ $product->Productcategory-> name }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Mô tả:</td>
                                        <td class="text-dark font-weight-semibold">
                                            <p>{!! $product->description !!}</p>
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