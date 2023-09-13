<?php

namespace App\Service\User;

use App\Respositories\User\UserRespositoryInterface;
use App\Service\BaseService;
use App\Service\User\UserServiceInterface;

class UserService extends BaseService implements UserServiceInterface
{
    public $repository;

    public function __construct(UserRespositoryInterface $UserRepository)
    {
        $this -> repository = $UserRepository;
    }
}