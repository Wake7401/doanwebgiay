@extends('backend.layout.master')
@section('title', 'Danh sách tài khoản')
@section('body')

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="./admin/dashboard" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <span class="breadcrumb-item active">Danh sách tài khoản</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row m-b-30">
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4 text-right">
                    <a href="./admin/user/create" class="btn btn-primary">
                        <i class="anticon anticon-plus-circle m-r-5"></i>
                        <span>Thêm tài khoản</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover e-commerce-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên tài khoản</th>
                            <th>Email</th>
                            <th>Quyền truy cập</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    #{{ $user->id }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid rounded"
                                            src="./frontend/img/user/{{ $user->avatar ?? 'default-avatar.jpg' }}"
                                            style="max-width: 60px" alt="">
                                        <h6 class="m-b-0 m-l-10">{{ $user->name }}</h6>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ App\Utilities\Constant::$user_level[$user->level] }}</td>
                                <td class="text-right">
                                    <a href="./admin/user/{{ $user->id }}" 
                                        class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="fas fa-align-justify"></i>
                                    </a>
                                    <a href="./admin/user/{{ $user->id }}/edit"
                                        class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <form action="./admin/user/{{$user->id}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-toggle="tooltip"
                                            data-placement="bottom"
                                            onclick="return cofirm('Bạn chắc chắn muốn xóa {{ $user->name }} ?')"
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