<?php

namespace App\Service\OrderDetail;

use App\Respositories\OrderDetail\OrderDetailRespositoryInterface;
use App\Service\BaseService;
use App\Service\OrderDetail\OrderDetailServiceInterface;

class OrderDetailService extends BaseService implements OrderDetailServiceInterface
{
    public $repository;

    public function __construct(OrderDetailRespositoryInterface $OrderDetailRepository)
    {
        $this -> repository = $OrderDetailRepository;
    }
}