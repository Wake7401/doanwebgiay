<?php

namespace App\Service\BlogComment;

use App\Respositories\BlogComment\BlogCommentRespositoryInterface;
use App\Service\BaseService;
use App\Service\BlogComment\BlogCommentServiceInterface;

class BlogCommentService extends BaseService implements BlogCommentServiceInterface
{
    public $repository;

    public function __construct(BlogCommentRespositoryInterface $BlogCommentRepository)
    {
        $this -> repository = $BlogCommentRepository;
    }
}