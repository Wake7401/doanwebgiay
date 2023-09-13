<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Brand\BrandServiceInterface;
use Illuminate\Http\Request;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use App\Service\ProductComment\ProductCommentServiceInterface;

class ShopController extends Controller
{
    private $productService;
    private $productCommentService;
    private $productCategoryService;
    private $brandService;

    public function __construct(ProductServiceInterface $productService, 
                                ProductCommentServiceInterface $productCommentService,
                                ProductCategoryServiceInterface $productCategoryService,
                                BrandServiceInterface $brandService)
    {   
        $this -> productService = $productService;
        $this -> productCommentService = $productCommentService;
        $this -> productCategoryService = $productCategoryService;
        $this -> brandService = $brandService;
    }

    public function show($id){
        $categories = $this -> productCategoryService -> all();
        $brands = $this -> brandService -> all();
        $product = $this -> productService -> find($id);
        $relatedProduct = $this -> productService -> getRelatedProducts($product);

        return view('frontend.shop.show',compact('product', 'relatedProduct', 'categories', 'brands'));
    }

    public function postComment(Request $request){
        $this -> productCommentService -> create($request ->all());
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $categories = $this -> productCategoryService -> all();
        $brands = $this -> brandService -> all();
        $products = $this -> productService ->getProductOnIndex($request);

        return view('frontend.shop.index', compact('products', 'categories','brands'));
    }

    public function category($categoryName, Request $request)
    {
        $categories = $this -> productCategoryService -> all();
        $brands = $this -> brandService -> all();
        $products = $this -> productService ->getProductByCategory($categoryName,$request);

        return view('frontend.shop.index', compact('products', 'categories','brands'));
    }
}
