@extends('backend.layout.master')
@section('title', 'Chi tiết tài khoản')
@section('body')
 <!-- Content Wrapper START -->
 <div class="main-content">
    <div class="page-header no-gutters has-tab">
        <div class="d-md-flex m-b-15 align-items-center justify-content-between">
            <div class="media align-items-center m-b-15">
                <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                    <img src="/frontend/img/user/{{ $user->avatar ?? 'default-avatar.jpg' }}" alt="">
                </div>
                <div class="m-l-15">
                    <h4 class="m-b-0">{{ $user->name }}</h4>
                    <p class="text-muted m-b-0">ID: #{{ $user->id }}</p>
                </div>
            </div>
            <div class="m-b-15">
                <a href="./admin/user/{{ $user->id }}/edit" class="btn btn-primary">
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
                                        <td>Email</td>
                                        <td class="text-dark font-weight-semibold">{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>SĐT</td>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Quyền truy cập</td>
                                        <td>{{ App\Utilities\Constant::$user_level[$user->level] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Thông tin chi tiết:</td>
                                        <td>
                                            <span class="badge badge-pill badge-cyan">{{ $user->description }}</span>
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