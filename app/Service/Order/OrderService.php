<?php

namespace App\Service\Order;

use App\Respositories\Order\OrderRespositoryInterface;
use App\Service\BaseService;
use App\Service\Order\OrderServiceInterface;

class OrderService extends BaseService implements OrderServiceInterface
{
    public $repository;

    public function __construct(OrderRespositoryInterface $OrderRepository)
    {
        $this -> repository = $OrderRepository;
    }

    public function getOrderByUserId($userId)
    {
        return $this-> repository->getOrderByUserId($userId);
    }
}