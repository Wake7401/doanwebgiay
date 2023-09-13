@extends('backend.layout.master')
@section('title', 'Thêm sản phẩm')
@section('body')
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="./admin/dashboard" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <a class="breadcrumb-item" href="./admin/product">Danh sách sản phẩm</a>
                <span class="breadcrumb-item active">Thêm sản phẩm</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="admin/product" enctype="multipart/form-data">
                @csrf
                @include('backend.components.notification')
                <div class="mb-3">
                    <label class="font-weight-semibold" for="productCategory">Danh mục</label>
                    <select class="custom-select" id="product_category_id" name="product_category_id">
                        <option value="" selected>--Danh mục--</option>
                        @foreach ($productCategories as $productCategory)
                        <option value="{{$productCategory -> id}}">{{$productCategory -> name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="font-weight-semibold" for="productCategory">Thương hiệu</label>
                    <select class="custom-select" id="brand_id" name="brand_id">
                        <option value="" selected>--Thương hiệu--</option>
                        @foreach ($brands as $brand)
                        <option value="{{$brand -> id}}">{{$brand -> name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Giá</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Giá giảm</label>
                    <input type="text" class="form-control" id="discount" name="discount">
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Thông tin chi tiết:</label>
                    <textarea name="description" id="description" cols="20" rows="4" class="form-control"></textarea>
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <div class="">
                        <input name="featured" id="featured" type="checkbox" value="1">
                        <label for="switch-1"></label>
                    </div>
                    <label for="radio1">Nổi bật</label>
                </div>
                <button type="submit" class="btn btn-primary">Tạo</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection