<?php

namespace App\Respositories\ProductComment;

use App\Models\ProductComment;
use App\Respositories\BaseRespositories;
use App\Respositories\ProductComment\ProductCommentRespositoryInterface;

class ProductCommentRespository extends BaseRespositories implements ProductCommentRespositoryInterface
{
    public function getModel()
    {
        return ProductComment::class;
    }
}