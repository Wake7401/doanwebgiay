@extends('backend.layout.master')
@section('title', 'Chỉnh sửa danh mục')
@section('body')
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="/" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <a class="breadcrumb-item" href="./admin/category">Danh sách danh mục</a>
                <span class="breadcrumb-item active">Chỉnh sửa danh mục</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="admin/category/{{$productCategory -> id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('backend.components.notification')
                <div class="mb-3">
                    <label for="username" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$productCategory -> name}}">
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection