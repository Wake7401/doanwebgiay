<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="{{ asset('/') }}" />
    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/x-icon" href="/frontend/img/favicon.ico">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/frontend/css/base.css">
    <link rel="stylesheet" href="/frontend/css/grid.css">
    <link rel="stylesheet" href="/frontend/css/footer.css">
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/frontend/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/frontend/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="/frontend/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/frontend/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/frontend/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/frontend/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/frontend/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/frontend/css/style.css" type="text/css">
</head>

<body>
    <!-- Start coding here -->

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="load">

        </div>
    </div>

    <!-- Header section begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa fa-envelope"></i>
                        anhkiet07042001@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone"></i>
                        0974128985
                    </div>
                </div>

                <div class="ht-right">
                    @if (Auth::check())
                        <ul class="dropdown">
                            <li><a href="./account/logout" class="login-panel">
                                    <i class="fa fa-user"></i>
                                    {{ Auth::user()->name }} - Đăng xuất
                                </a></li>
                        </ul>
                    @else
                        <a href="./account/login" class="login-panel">
                            <i class="fa fa-user"></i>
                            Đăng nhập
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="contain">
            <div class="container">
                <div class="inner-header">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <div class="logo">
                                <a href="./">
                                    <img src="/frontend/img/logo.png" height="25" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <form action="shop">
                                <div class="advanced-search">
                                    <div class="input-group" style="max-width: 100%">
                                        <input name="search" value="{{ request('search') }}" type="text"
                                            placeholder="Tìm kiếm">
                                        <button type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <ul class="nav-right">
                                <li class="cart-icon">
                                    <a href="./cart">
                                        <i class="icon_bag_alt"></i>
                                        <span class="cart-count">{{ Cart::count() }}</span>
                                    </a>
                                    <div class="cart-hover">
                                        @if (Cart::count() > 0)
                                            <div class="select-items">
                                                <table>
                                                    <tbody>
                                                        @foreach (Cart::content() as $cart)
                                                            <tr data-rowId="{{ $cart->rowId }}">
                                                                <td class="si-pic">
                                                                    <img src="/frontend/img/products/{{ $cart->options->images[0]->path }}"
                                                                        alt="" style="width: 100px">
                                                                </td>
                                                                <td class="si-text">
                                                                    <div class="product-selected">
                                                                        <p>{{ number_format($cart->price, 0, '.', '.') }}đ
                                                                            x {{ $cart->qty }}</p>
                                                                        <h6>{{ $cart->name }}</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="si-close">
                                                                    <i class="ti-cose"
                                                                        onclick="removeCart('{{ $cart->rowId }}')"></i>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="select-total">
                                                <span>Tổng cộng</span>
                                                <h5>{{ Cart::total() }}đ</h5>
                                            </div>
                                            <div class="select-button">
                                                <a href="./cart" class="primary-btn view-card">XEM GIỎ HÀNG</a>
                                                <a href="./checkout" class="primary-btn checkout-btn">THANH TOÁN</a>
                                            </div>
                                        @else
                                            <img src="frontend/img/giohangtrong.png" alt="">
                                        @endif

                                    </div>
                                </li>
                                <li class="cart-price">
                                    {{ Cart::total() }}đ
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                </div>
                <div class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ request()->segment(1) == '' ? 'active' : '' }}"><a href="./">Trang
                                chủ</a></li>
                        <li class="{{ request()->segment(1) == 'shop' ? 'active' : '' }}"><a
                                href="./shop">Shop</a></li>
                        <li>
                            <a href="./about">Về chúng tôi</a>
                        </li>
                        <li><a href="./blog">Tin tức</a></li>
                        <li><a href="#">Trang</a>
                            <ul class="dropdown">
                                <li><a href="./account/my-order">Đơn hàng</a></li>
                                <li><a href="./account/register">Đăng kí</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </header>

    <!-- Header section end -->

    @yield('body')
    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="/frontend/img/footer-logo.png" height="25" alt="">
                            </a>
                        </div>
                        <ul>
                            <li>Lô 1, Đường số 3, Khu dân cư Công ty 8, Phường Phú Thứ, Quận Cái Răng, Thành phố Cần Thơ
                            </li>
                            <li>Phone: 09741278985</li>
                            <li>Email: anhkiet07042001@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Hỗ trợ</h5>
                        <ul>
                            <li><a href="#">Chăm sóc khách hàng</a></li>
                            <li><a href="#">Thanh toán</a></li>
                            <li><a href="#">Hướng dẫn mua hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Chính sách</h5>
                        <ul>
                            <li><a href="#">Chế độ bảo hành</a></li>
                            <li><a href="#">Chính sách đổi hàng</a></li>
                            <li><a href="#">Bảo mật thông tin</a></li>
                            <li><a href="#">Chính sách giao nhận</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All right reserved | This template is made with <i
                                class="fa fa-heart-o" aria-hidden="true"></i> by <a href=""
                                target="_blank">Đặng Anh Kiệt</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="/frontend/js/jquery-3.3.1.min.js"></script>
    <script src="/frontend/js/bootstrap.min.js"></script>
    <script src="/frontend/js/jquery-ui.min.js"></script>
    <script src="/frontend/js/jquery.countdown.min.js"></script>
    <script src="/frontend/js/jquery.nice-select.min.js"></script>
    <script src="/frontend/js/jquery.zoom.min.js"></script>
    <script src="/frontend/js/jquery.dd.min.js"></script>
    <script src="/frontend/js/jquery.slicknav.js"></script>
    <script src="/frontend/js/owl.carousel.min.js"></script>
    <script src="/frontend/js/main.js"></script>
</body>

</html>
