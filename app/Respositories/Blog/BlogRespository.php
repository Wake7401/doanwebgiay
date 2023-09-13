<?php

namespace App\Respositories\Blog;

use App\Models\Blog;
use App\Respositories\BaseRespositories;
use App\Respositories\Blog\BlogRespositoryInterface;

class BlogRespository extends BaseRespositories implements BlogRespositoryInterface
{
    public function getModel()
    {
        return Blog::class;
    }
    
    public function getLatestBlogs($limt =3){
        return $this -> model -> orderBy('id', 'desc')
                     -> limit($limt)
                     -> get();
    }
}