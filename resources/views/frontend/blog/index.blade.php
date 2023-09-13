@extends('frontend.layout.master')
@section('title', 'Tin tức')
@section('body')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Tin tức</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    @foreach ($blogs as $blog)
                    <div class="blog-item ">
                        <div class="bi-pic">
                            <img src="/frontend/img/blog/{{ $blog->image }}" alt="">
                        </div>
                        <div class="bi-text">
                            <span><?php
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                echo date('d/m/Y', strtotime($blog->created_at));
                                ?></span>
                            <a href="blog/{{$blog->id}}">
                                <h4>{{ $blog->title }}</h4>
                            </a>
                            <p>{{ $blog->subtitle }}</p>
                        </div>
                        <div class="bi-btn">
                            <a href="blog/{{$blog->id}}" class="read-more">Xem thêm</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
