<?php

namespace App\Respositories\BlogComment;

use App\Models\BlogComment;
use App\Respositories\BaseRespositories;
use App\Respositories\BlogComment\BlogCommentRespositoryInterface;

class BlogCommentRespository extends BaseRespositories implements BlogCommentRespositoryInterface
{
    public function getModel()
    {
        return BlogComment::class;
    }
}