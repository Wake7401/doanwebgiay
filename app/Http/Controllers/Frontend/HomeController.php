<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Blog\BlogServiceInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $productService;
    private $blogService;
    private $productCategoryService;
    
    public function __construct(ProductServiceInterface $productService,
                                BlogServiceInterface $blogService,
                                ProductCategoryServiceInterface $productCategoryService)
    {
        $this -> productService = $productService;
        $this -> blogService = $blogService;
        $this -> productCategoryService = $productCategoryService;
    }

    public function index()
    {
        $featuredProducts = $this -> productService -> getFeaturedProductsByCategory();
        $blogs = $this -> blogService -> getLatestBlogs();
        $categories = $this -> productCategoryService -> all();
        
        return view('frontend.index', compact('featuredProducts', 'blogs', 'categories'));
    }
}
