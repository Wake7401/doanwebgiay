<?php

use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Frontend\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Models\ProductCategory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Fontend
Route::get('/', [HomeController::class, 'index']);

Route::prefix('shop') -> group(function (){
    Route::get('product/{id}',[ShopController::class,'show']);
    Route::post('product/{id}',[ShopController::class,'postComment']);
    Route::get('',[ShopController::class, 'index']);
    Route::get('category/{categoryName}',[ShopController::class,'category']);
});

Route::prefix('cart') -> group(function(){
    Route::get('add/{id}', [CartController::class,'add']);
    Route::get('/',[CartController::class, 'index']);
    Route::get('delete',[CartController::class, 'delete']);
    Route::get('update',[CartController::class, 'update']);
});

Route::prefix('checkout') -> group(function(){
    Route::get('',[CheckoutController::class,'index']);
    Route::post('/',[CheckoutController::class, 'addOrder']);
    Route::get('/result',[CheckoutController::class, 'result']);
    Route::get('/vnPayCheck',[CheckoutController::class,'vnPayCheck']);
});

Route::prefix('account') -> group(function(){
   Route::get('login',[AccountController::class,'login']);
   Route::post('login',[AccountController::class, 'checkLogin']); 
   Route::get('register',[AccountController::class,'register']);
   Route::get('logout',[AccountController::class,'logout']);
   Route::post('register',[AccountController::class,'postRegister']);

   Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function(){
        Route::get('/',[AccountController::class,'myOrderIndex']);
        Route::get('{id}',[AccountController::class,'myOrderShow']);
   });
});

Route::prefix('blog') -> group(function(){
    Route::get('',[BlogController::class,'index']);
    Route::get('{id}',[BlogController::class,'show']);
    Route::post('{id}',[BlogController::class,'postComment']);
});

Route::get('about',[AboutController::class,'index']);

//Admin
Route::prefix('admin')-> middleware('CheckAdminLogin')->group(function(){
    Route::redirect('','admin/dashboard');

    Route::resource('user',UserController::class);
    Route::resource('category',ProductCategoryController::class);
    Route::resource('brand',BrandController::class);
    Route::resource('product',ProductController::class);
    Route::resource('product/{product_id}/image', ProductImageController::class);
    Route::resource('product/{product_id}/detail', ProductDetailController::class);
    Route::resource('order',OrderController::class);
    Route::resource('blog',AdminBlogController::class);

    Route::prefix('dashboard') -> group(function(){
        Route::get('', 'App\Http\Controllers\Admin\HomeController@index');
    });

    Route::prefix('login') -> group(function(){
        Route::get('', 'App\Http\Controllers\Admin\HomeController@getLogin')-> withoutMiddleware('CheckAdminLogin');
        Route::post('', 'App\Http\Controllers\Admin\HomeController@postLogin')-> withoutMiddleware('CheckAdminLogin');
    });

    Route::get('logout','App\Http\Controllers\Admin\HomeController@logout');
});