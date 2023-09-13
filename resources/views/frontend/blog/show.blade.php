@extends('frontend.layout.master')
@section('title', $blog->title)
@section('body')
    <!-- Blog Details Section Begin -->
    <div class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>{{ $blog->title }}</h2>
                            <p>Admin <span>- <?php
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            echo date('d/m/Y', strtotime($blog->created_at));
                            ?></span></span></p>
                        </div>
                        <div class="blog-large-pic">
                            <img src="/frontend/img/blog/{{ $blog->image }}" alt="">
                        </div>
                        <div class="blog-detail-desc">
                            <p>{!! $blog->content !!}</p>
                        </div>


                        <div class="tag-share">
                            <div class="blog-share">
                                <span>Share: </span>
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                            </div>
                        </div>
                        @foreach ($blog->blogComments as $blogComment)
                            <div class="posted-by">
                                <div class="pb-pic"
                                    style="height: 63px;
                            width: 63px;
                            border-radius: 50%;">
                                    <img src="/frontend/img/user/{{ $blogComment->user->avatar ?? 'default-avatar.jpg' }}"
                                        alt="">
                                </div>
                                <div class="pb-text">
                                    <h5>{{ $blogComment->name }} - <span><?php
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    echo date('d/m/Y', strtotime($blogComment->created_at));
                                    ?></span></h5>
                                    <p>{{ $blogComment->messages }}</p>
                                </div>
                            </div>
                        @endforeach

                        <div class="leave-comment">
                            <h4>Để lại bình luận</h4>
                            <form action="" class="comment-form" method="POST">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
                                <input type="hidden" name="user_id"
                                                    value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? null }}" />
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Tên" name="name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Email" name="email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Bình luận" name="messages"></textarea>
                                        <button type="submit" class="site-btn">Bình luận</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details Section End -->
@endsection
