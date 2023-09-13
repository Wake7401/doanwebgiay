<?php

namespace App\Service\Product;

use App\Respositories\Product\ProductRespositoryInterface;
use App\Service\BaseService;
use Illuminate\Http\Request;

class ProductService extends BaseService implements ProductServiceInterface
{
    public $repository;
    public function __construct(ProductRespositoryInterface $productRespository)
    {
        $this -> repository = $productRespository;
    }

    public function find(int $id){
        $product = $this->repository->find($id);
        $avgRating = 0;
        $sumRating = array_sum(array_column($product->productComments->toArray(), 'rating'));
        $countRating = count($product->productComments);
        if ($countRating != 0) {
            $avgRating = $sumRating / $countRating;
        }
        $product->avgRating = $avgRating;
        return $product;
    }

    public function getRelatedProducts($product, $limit = 4){
        return $this -> repository -> getRelatedProducts($product,$limit);
    }

    public function getFeaturedProductsByCategory()
    {
        return [
            'nam' => $this -> repository -> getFeaturedProductsByCategory(1),
            'nữ' => $this -> repository -> getFeaturedProductsByCategory(2),
        ];
    }

    public function getProductOnIndex($request)
    {
        return $this -> repository -> getProductOnIndex($request);
    }

    public function getProductByCategory($categoryName, $request){
        return $this -> repository-> getProductByCategory($categoryName,$request);
    }
}