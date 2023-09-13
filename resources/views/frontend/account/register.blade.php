@extends('frontend.layout.master')
@section('title', 'Đăng ký')
@section('body')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Đăng ký</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Đăng ký</h2>
                        @if (session('notification'))
                            <div class="alert alert-warning" role="alert">
                                {{session('notification')}}
                            </div>
                        @endif

                        <form action="" method="POST">
                            @csrf
                            <div class="group-input">
                                <label for="username">Tên tài khoản *</label>
                                <input type="text" name="name" id="username">
                            </div>
                            <div class="group-input">
                                <label for="username">Email *</label>
                                <input type="email" name="email" id="username">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu *</label>
                                <input type="password" name="password" id="pass">
                            </div>
                            <div class="group-input">
                                <label for="pass">Nhập lại mật khẩu *</label>
                                <input type="password" name="password_confirmation" id="pass">
                            </div>
                            <button type="submit" class="site-btn login-btn">Đăng ký</button>
                        </form>
                        <div class="switch-login">
                            <a href="./account/login" class="or-login">Hoặc Đăng Nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Section End -->
@endsection
