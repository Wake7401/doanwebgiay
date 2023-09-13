<?php

namespace App\Service\ProductComment;

use App\Respositories\ProductComment\ProductCommentRespositoryInterface;
use App\Service\BaseService;
use App\Service\ProductComment\ProductCommentServiceInterface;

class ProductCommentService extends BaseService implements ProductCommentServiceInterface
{
    public $repository;

    public function __construct(ProductCommentRespositoryInterface $ProductCommentRepository)
    {
        $this -> repository = $ProductCommentRepository;
    }
}