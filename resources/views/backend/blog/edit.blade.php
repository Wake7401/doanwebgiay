@extends('backend.layout.master')
@section('title', 'Chỉnh sửa tin tức')
@section('body')
<div class="main-content">
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="./admin/dashboard" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <a class="breadcrumb-item" href="./admin/blog">Danh sách tin tức</a>
                <span class="breadcrumb-item active">Chỉnh sửa tin tức</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="admin/blog/{{$blog->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('backend.components.notification')
                <input type="hidden" id="user_id" name="user_id" value="{{Auth::user() -> id ?? ''}}">
                <div class="mb-3">
                    <label for="" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$blog -> title}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Phụ đề</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{$blog -> subtitle}}">
                </div>
                <div class="d-md-flex mb-3">
                    <div class="m-b-10 m-r-15">
                        <label for="image">Ảnh</label>
                        <div class="custom-file">
                            <img style="height: 200px; cursor: pointer;" class="thumbnail"
                                data-toggle="tooltip" title="Click to change the image" data-placement="bottom"
                                src="/frontend/img/blog/{{ $blog->image ?? '' }}" alt="image">
                            <input name="image" id="image" type="file" onchange="changeImg(this)"
                                class="image form-control-file" style="display: none;" value="">
                            <small class="form-text text-muted">
                                Click vào ảnh để thay đổi (bắt buộc)
                            </small>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Nội dung:</label>
                    <textarea name="content" id="content" cols="20" rows="4" class="form-control">{{$blog->content}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tạo</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection