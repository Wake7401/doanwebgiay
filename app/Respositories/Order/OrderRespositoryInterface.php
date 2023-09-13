<?php

namespace App\Respositories\Order;

use App\Respositories\RespositoriesInterface;

interface OrderRespositoryInterface extends RespositoriesInterface
{
    public function getOrderByUserId($userId);
}