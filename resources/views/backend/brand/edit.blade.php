@extends('backend.layout.master')
@section('title', 'Chỉnh sửa thương hiệu')
@section('body')
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="./admin/dashboard" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <a class="breadcrumb-item" href="./admin/brand">Danh sách thương hiệu</a>
                <span class="breadcrumb-item active">Chỉnh sửa thương hiệu</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="admin/brand/{{$brand -> id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('backend.components.notification')
                <div class="mb-3">
                    <label for="username" class="form-label">Tên thương hiệu</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$brand -> name}}">
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection