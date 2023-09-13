<?php

namespace App\Respositories\User;

use App\Models\User;
use App\Respositories\BaseRespositories;
use App\Respositories\User\UserRespositoryInterface;

class UserRespository extends BaseRespositories implements UserRespositoryInterface
{
    public function getModel()
    {
        return User::class;
    }
}