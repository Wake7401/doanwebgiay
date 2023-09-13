<?php

namespace App\Service\Blog;

use App\Respositories\Blog\BlogRespositoryInterface;
use App\Service\BaseService;
use App\Service\Blog\BlogServiceInterface;

class BlogService extends BaseService implements BlogServiceInterface
{
    public $repository;

    public function __construct(BlogRespositoryInterface $BlogRepository)
    {
        $this -> repository = $BlogRepository;
    }

    public function getLatestBlogs($limt =3){
        return $this -> repository -> getLatestBlogs($limt);
    }
}