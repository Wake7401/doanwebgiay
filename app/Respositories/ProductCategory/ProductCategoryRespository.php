<?php

namespace App\Respositories\ProductCategory;

use App\Models\ProductCategory;
use App\Respositories\BaseRespositories;
use App\Respositories\ProductCategory\ProductCategoryRespositoryInterface;

class ProductCategoryRespository extends BaseRespositories implements ProductCategoryRespositoryInterface
{
    public function getModel()
    {
        return ProductCategory::class;
    }
}