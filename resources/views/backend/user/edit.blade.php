@extends('backend.layout.master')
@section('title', 'Chỉnh sửa tài khoản')
@section('body')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="./admin/dashboard" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="./admin/user">Danh sách tài khoản</a>
                    <span class="breadcrumb-item active">Chỉnh sửa tài khoản</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="admin/user/{{ $user->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('backend.components.notification')
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" {{ $user->address }}>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" {{ $user->phone }}>
                    </div>

                    <div class="mb-3">
                        <label class="font-weight-semibold" for="productCategory">Quyền truy cập</label>
                        <select class="custom-select" required id="level" name="level">
                            <option value="" selected>-- Quyền truy cập --</option>
                            @foreach (\App\Utilities\Constant::$user_level as $key => $value)
                                <option value="{{ $key }}" {{ $user->level == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Thông tin chi tiết:</label>
                        <textarea name="description" id="description" cols="20" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="d-md-flex mb-3">
                        <div class="m-b-10 m-r-15">
                            <label for="avatar">Avatar</label>
                            <div class="custom-file">
                                <img style="height: 200px; cursor: pointer;" class="thumbnail rounded-circle"
                                    data-toggle="tooltip" title="Click to change the image" data-placement="bottom"
                                    src="./backend/assets/images/avatars/thumb-3.jpg" alt="Avatar">
                                <input name="avatar" id="avatar" type="file" onchange="changeImg(this)"
                                    class="image form-control-file" style="display: none;" value="">
                                <input type="hidden" name="image_old" value="">
                                <small class="form-text text-muted">
                                    Click vào ảnh để thay đổi (bắt buộc)
                                </small>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
