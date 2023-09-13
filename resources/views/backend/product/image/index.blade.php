@extends('backend.layout.master')
@section('title', 'Hình ảnh sản phẩm')
@section('body')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="./admin/dashboard" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                    <span class="breadcrumb-item active">Hình ảnh {{$product -> name}}</span>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="username" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}"
                        disabled>
                </div>

                <div class="d-md-flex mb-3">
                    <label class="m-r-10" for="avatar">Hình ảnh</label>
                    <div class="m-b-10 m-r-15 d-flex">
                        @foreach ($productImages as $productImage)
                            <form action="./admin/product/{{$product -> id}}/image/{{$productImage-> id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Bạn muốn xóa hình ảnh này?')"
                                    class="btn btn-sm btn-outline-danger border-0 position-absolute">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                            <div class="m-r-10">
                                <img style="height: 200px; cursor: pointer;" class="thumbnail" data-toggle="tooltip"
                                    data-placement="bottom" src="/frontend/img/products/{{ $productImage->path }}"
                                    alt="">
                            </div>
                        @endforeach
                        <form action="admin/product/{{$product-> id}}/image" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class=" m-r-10">
                                <img style="height: 200px; cursor: pointer;" class="thumbnail" data-toggle="tooltip"
                                    title="Click vào để thêm ảnh" data-placement="bottom"
                                    src="./backend/assets/images/add-image.jpg" alt="">
                                <input name="image" id="image" type="file" onchange="changeImg(this); this.form.submit(); "
                                accept="image/x-png,image/gif,image/jpeg"
                                    class="image form-control-file" style="display: none;">
                                <input type="hidden" name="product_id" value="{{$product-> id}}">
                            </div>
                        </form>
                    </div>
                </div>
                <a href="./admin/product/{{ $product->id }}" type="submit" class="btn btn-primary">OK</a>
            </div>
        </div>
    </div>
@endsection
