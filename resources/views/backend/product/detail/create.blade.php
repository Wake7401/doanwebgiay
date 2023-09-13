@extends('backend.layout.master')
@section('title', 'Thêm chi tiết')
@section('body')
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="./admin/dashboard" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <a class="breadcrumb-item" href="./admin/product/{{$product-> id}}/detail">Danh sách chi tiết</a>
                <span class="breadcrumb-item active">Thêm chi tiết</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="admin/product/{{$product-> id}}/detail" enctype="multipart/form-data">
                @csrf
                @include('backend.components.notification')
                <input type="hidden" name="product_id" value="{{$product -> id}}">
                <div class="mb-3">
                    <label for="username" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$product -> name}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Màu sắc</label>
                    <input type="text" class="form-control" id="color" name="color" value="">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Size</label>
                    <input type="text" class="form-control" id="size" name="size" value="">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Số lượng</label>
                    <input type="text" class="form-control" id="qty" name="qty" value="">
                </div>
                <button type="submit" class="btn btn-primary">Tạo</button>
            </form>
        </div>
    </div>
</div>
@endsection