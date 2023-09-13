<?php

namespace App\Respositories\Blog;

use App\Respositories\RespositoriesInterface;

interface BlogRespositoryInterface extends RespositoriesInterface
{
    public function getLatestBlogs($limt =3);
}