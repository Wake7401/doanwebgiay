<?php

namespace App\Providers;

use App\Respositories\Blog\BlogRespository;
use App\Respositories\Blog\BlogRespositoryInterface;
use App\Respositories\BlogComment\BlogCommentRespository;
use App\Respositories\BlogComment\BlogCommentRespositoryInterface;
use App\Respositories\Brand\BrandRespository;
use App\Respositories\Brand\BrandRespositoryInterface;
use App\Respositories\Order\OrderRespository;
use App\Respositories\Order\OrderRespositoryInterface;
use App\Respositories\OrderDetail\OrderDetailRespository;
use App\Respositories\OrderDetail\OrderDetailRespositoryInterface;
use App\Respositories\Product\ProductRespository;
use App\Respositories\Product\ProductRespositoryInterface;
use App\Respositories\ProductCategory\ProductCategoryRespository;
use App\Respositories\ProductCategory\ProductCategoryRespositoryInterface;
use App\Respositories\ProductComment\ProductCommentRespository;
use App\Respositories\ProductComment\ProductCommentRespositoryInterface;
use App\Respositories\User\UserRespository;
use App\Respositories\User\UserRespositoryInterface;
use App\Service\Blog\BlogService;
use App\Service\Blog\BlogServiceInterface;
use App\Service\BlogComment\BlogCommentService;
use App\Service\BlogComment\BlogCommentServiceInterface;
use App\Service\Brand\BrandService;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Order\OrderService;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailService;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use App\Service\Product\ProductService;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryService;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use App\Service\ProductComment\ProductCommentService;
use App\Service\ProductComment\ProductCommentServiceInterface;
use App\Service\User\UserService;
use App\Service\User\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Product
        $this -> app -> singleton(
            ProductRespositoryInterface::class,
            ProductRespository::class
        );

        $this ->app ->singleton(
            ProductServiceInterface::class,
            ProductService::class
        );

        //ProductComment
        $this -> app -> singleton(
            ProductCommentRespositoryInterface::class,
            ProductCommentRespository::class
        );

        $this ->app ->singleton(
            ProductCommentServiceInterface::class,
            ProductCommentService::class
        );

        //Blog
        $this -> app -> singleton(
            BlogRespositoryInterface::class,
            BlogRespository::class
        );

        $this ->app ->singleton(
            BlogServiceInterface::class,
            BlogService::class
        );

        //ProductCategory
        $this -> app -> singleton(
            ProductCategoryRespositoryInterface::class,
            ProductCategoryRespository::class,
        );

        $this ->app ->singleton(
            ProductCategoryServiceInterface::class,
            ProductCategoryService::class
        );

        //Brand
        $this -> app -> singleton(
            BrandRespositoryInterface::class,
            BrandRespository::class
        );

        $this ->app ->singleton(
            BrandServiceInterface::class,
            BrandService::class
        );

        //Order
        $this -> app -> singleton(
            OrderRespositoryInterface::class,
            OrderRespository::class
        );

        $this ->app ->singleton(
            OrderServiceInterface::class,
            OrderService::class
        );

        //OrderDetail
        $this -> app -> singleton(
            OrderDetailRespositoryInterface::class,
            OrderDetailRespository::class
        );

        $this ->app ->singleton(
            OrderDetailServiceInterface::class,
            OrderDetailService::class
        );

        //User
        $this -> app -> singleton(
            UserRespositoryInterface::class,
            UserRespository::class
        );

        $this ->app ->singleton(
            UserServiceInterface::class,
            UserService::class
        );

        //BlogComment
        $this -> app -> singleton(
            BlogCommentRespositoryInterface::class,
            BlogCommentRespository::class
        );
        $this -> app -> singleton(
            BlogCommentServiceInterface::class,
            BlogCommentService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
