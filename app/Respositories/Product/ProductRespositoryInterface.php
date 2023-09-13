<?php

namespace App\Respositories\Product;
use App\Respositories\RespositoriesInterface;

interface ProductRespositoryInterface extends RespositoriesInterface
{
    public function getRelatedProducts($product, $limit = 4);
    public function getFeaturedProductsByCategory(int $categoryId);
    public function getProductOnIndex($request);
    public function getProductByCategory($categoryName, $request);
}