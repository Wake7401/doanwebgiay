@extends('backend.layout.master')
@section('title', 'Danh sách sản phẩm')
@section('body')

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="./admin/dashboard" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <span class="breadcrumb-item active">Danh sách sản phẩm</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row m-b-30">
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4 text-right">
                    <a href="./admin/product/create" class="btn btn-primary">
                        <i class="anticon anticon-plus-circle m-r-5"></i>
                        <span>Thêm sản phẩm</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover e-commerce-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Nổi bật</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    #{{ $product->id }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid rounded"
                                            src="/frontend/img/products/{{ $product->productImages[0]-> path ?? '' }}"
                                            style="max-width: 60px" alt="">
                                        <h6 class="m-b-0 m-l-10">{{ $product->name }}</h6>
                                    </div>
                                </td>
                                <td>{{ number_format($product->price, 0, '.', '.') }}đ</td>

                                <td>
                                    @if ($product->featured > 0)
                                        <div class="d-flex align-items-center">
                                            <div class="badge badge-success badge-dot m-r-10"></div>
                                            <div>Có</div>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-center">
                                            <div class="badge badge-danger badge-dot m-r-10"></div>
                                            <div>Không</div>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a href="./admin/product/{{ $product->id }}" 
                                        class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="fas fa-align-justify"></i>
                                    </a>
                                    <a href="./admin/product/{{ $product->id }}/edit"
                                        class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <form action="./admin/product/{{$product->id}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-toggle="tooltip"
                                            data-placement="bottom"
                                            onclick="return cofirm('Bạn chắc chắn muốn xóa {{ $product->name }} ?')"
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