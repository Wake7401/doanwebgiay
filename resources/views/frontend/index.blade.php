@extends('frontend.layout.master')
@section('title', 'Trang chủ')
@section('body')
    <!-- Hero section begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="/frontend/img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                           
                            <h1 style="color: white">GIÀY CHÍNH HÃNG</h1>
                            <p style="color: white">Bán các loại giày chính hãng mới nhất !!!</p>
                            <a href="./shop" class="primary-btn">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="/frontend/img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h1 style="color: white">SNEAKER GIÁ RẺ</h1>
                            <p style="color: white">Siêu sale đặc biệt trong tháng 5</p>
                            <a href="./shop" class="primary-btn">Mua ngay</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->

    <!-- Seller section begin -->
    <div class="seller">
        <div class="container">
            <div class="sale-box row">
                <div class="box-shortcode col-lg-3">
                    <img src="https://demo.harutheme.com/clarivo/wp-content/uploads/2018/03/icon1.png" alt=""
                        class="box-shortcode__img">
                    <div class="box-shordcode__text">
                        <h2 class="box-shortcode__heading">Miễn phí vận chuyển</h2>
                        <span class="box-shortcode__description">Với đơn hàng trên 600.000đ</span>
                    </div>
                </div>

                <div class="box-shortcode col-lg-3">
                    <img src="https://demo.harutheme.com/clarivo/wp-content/uploads/2018/03/icon2.png" alt=""
                        class="box-shortcode__img">
                    <div class="box-shordcode__text">
                        <h2 class="box-shortcode__heading">Đổi trả hàng trong 30 ngày</h2>
                        <span class="box-shortcode__description">Nếu sản phẩm có vấn đề</span>
                    </div>
                </div>

                <div class="box-shortcode col-lg-3">
                    <img src="https://demo.harutheme.com/clarivo/wp-content/uploads/2018/03/icon3.png" alt=""
                        class="box-shortcode__img">
                    <div class="box-shordcode__text">
                        <h2 class="box-shortcode__heading">Thanh toán an toàn</h2>
                        <span class="box-shortcode__description">Thanh toán an toàn 100%</span>
                    </div>
                </div>

                <div class="box-shortcode col-lg-3">
                    <img src="https://demo.harutheme.com/clarivo/wp-content/uploads/2018/03/icon4.png" alt=""
                        class="box-shortcode__img">
                    <div class="box-shordcode__text">
                        <h2 class="box-shortcode__heading">Đặt hàng trực tuyến</h2>
                        <span class="box-shortcode__description">24/24 giờ</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="seller__header col-lg-12">
                    Giày nữ
                </div>
            </div>
        </div>
        <div class="container">
            <div class="seller__product row">
                @foreach ($featuredProducts['nữ'] as $product)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        @include('frontend.components.product-item')
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="seller__header col-lg-12">
                    Giày nam
                </div>
            </div>
        </div>
        <div class="container">
            <div class="seller__product row">
                @foreach ($featuredProducts['nam'] as $product)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        @include('frontend.components.product-item')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Seller section end -->

    <!-- Latest blog section begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Tin tức</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-blog">
                            <img src="/frontend/img/blog/{{ $blog->image }}" alt="">
                            <div class="latest-text">
                                <div class="tag-list">
                                    <div class="tag-item">
                                        <i class="fa fa-calendar-o"></i>
                                        <?php
                                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                                        echo date('d/m/Y', strtotime($blog->created_at));
                                        ?>
                                    </div>
                                    <div class="tag-item">
                                        <i class="fa fa-comment-o"></i>
                                        {{ is_countable($blog->blogComments) ? count($blog->blogComments) : 0 }}
                                    </div>
                                </div>
                                <a href="blog/{{$blog->id}}">
                                    <h4>{{ $blog->title }}</h4>
                                </a>
                                <p>{{ $blog->subtitle }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- Latest blog section end -->
@endsection
