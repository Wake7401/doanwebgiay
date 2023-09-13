@extends('backend.layout.master')
@section('title', 'Thông tin chi tiết sản phẩm')
@section('body')

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="./admin/dashboard" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <span class="breadcrumb-item active">Thông tin chi tiết :{{$product -> name}}</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row m-b-30">
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4 text-right">
                    <a href="./admin/product/{{$product-> id}}/detail/create" class="btn btn-primary">
                        <i class="anticon anticon-plus-circle m-r-5"></i>
                        <span>Thêm </span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover e-commerce-table">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm </th>
                            <th>Màu sắc</th>
                            <th>Size</th>
                            <th>Số lượng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($productDetails as $productDetail)
                            <tr>
                                <td>
                                    <h6 class="m-b-0 m-l-10">{{ $product->name }}</h6>
                                </td>
                                <td>
                                    <h6 class="m-b-0 m-l-10">{{ $productDetail-> color}}</h6>
                                </td>
                                <td>
                                    <h6 class="m-b-0 m-l-10">{{ $productDetail-> size}}</h6>
                                </td>
                                <td>
                                    <h6 class="m-b-0 m-l-10">{{ $productDetail-> qty}}</h6>
                                </td>
                                <td class="text-right">
                                    <a href="./admin/product/{{$product-> id}}/detail/{{$productDetail-> id}}/edit"
                                        class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <form action="/admin/product/{{$product-> id}}/detail/{{$productDetail-> id}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-toggle="tooltip"
                                            data-placement="bottom"
                                            onclick="return cofirm('Bạn chắc chắn muốn xóa {{ $productDetail->name }} ?')"
                                        class="btn btn-icon btn-hover btn-sm btn-rounded">
                                            <i class="anticon anticon-delete"></i>
                                        </button>
                                    </form>
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