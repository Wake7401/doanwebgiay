<?php

namespace App\Service\Brand;

use App\Respositories\Brand\BrandRespositoryInterface;
use App\Service\BaseService;
use App\Service\Brand\BrandServiceInterface;

class BrandService extends BaseService implements BrandServiceInterface
{
    public $repository;

    public function __construct(BrandRespositoryInterface $BrandRepository)
    {
        $this -> repository = $BrandRepository;
    }
}