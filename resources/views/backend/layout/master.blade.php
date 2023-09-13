<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/img/favicon.ico">

    <!-- page css -->
    <link href="./backend/assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Core css -->
    <link href="./backend/assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="./admin/dashboard">
                        <img src="./backend/assets/images/logo/logo.png" alt="Logo">
                        <img class="logo-fold" src="./backend/assets/images/logo/logo-fold.png" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="./admin/dashboard">
                        <img src="./backend/assets/images/logo/logo-white.png" alt="Logo">
                        <img class="logo-fold" src="./backend/assets/images/logo/logo-fold-white.png" alt="Logo">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="/frontend/img/user/{{ Auth::user()->avatar ?? 'default-avatar.jpg' }}"  alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="/frontend/img/user/{{ Auth::user()->avatar ?? 'default-avatar.jpg' }}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold">{{Auth::user()-> name ?? ''}}</p>
                                            <p class="m-b-0 opacity-07">{{Auth::user()-> email ?? ''}}</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="./admin/logout" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>    
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="./admin/dashboard">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="./admin/user">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Quản lí tài khoản</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="./admin/category">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Quản lí danh mục</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="./admin/brand">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Quản lí thương hiệu</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="./admin/product">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Quản lí sản phẩm</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="./admin/order">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Quản lí đơn hàng</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="./admin/blog">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Quản lí tin tức</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->
            <div class="page-container">
                @yield('body')
                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright © AK-shop. All rights reserved.</p>
                    </div>
                </footer>
                <!-- Footer END -->
            </div>
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="./backend/assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="./backend/assets/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="./backend/assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
    <script src="./backend/assets/js/pages/e-commerce-order-list.js"></script>
    <script src="./backend/assets/js/my-script.js"></script>

    <!-- Core JS -->
    <script src="./backend/assets/js/app.min.js"></script>

</body>

</html>