<?php

namespace App\Service\ProductCategory;

use App\Respositories\ProductCategory\ProductCategoryRespositoryInterface;
use App\Service\BaseService;
use App\Service\ProductCategory\ProductCategoryServiceInterface;

class ProductCategoryService extends BaseService implements ProductCategoryServiceInterface
{
    public $repository;

    public function __construct(ProductCategoryRespositoryInterface $ProductCategoryRepository)
    {
        $this -> repository = $ProductCategoryRepository;
    }
}