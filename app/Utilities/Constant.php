<?php

namespace App\Utilities;

class Constant
{
    //Order

    const order_status_ReceiveOrders = 1;
    const order_status_Unconfirmed = 2;
    const order_status_Confirmed = 3;
    const order_status_Paid = 4;
    const order_status_Processing = 5;
    const order_status_Shipping = 6;
    const order_status_Finish = 7;
    const order_status_Cancel = 0;
    public static $order_status = [
        self::order_status_ReceiveOrders => 'Nhận đơn đặt hàng',
        self::order_status_Unconfirmed => 'Chưa được xác nhận',
        self::order_status_Confirmed => 'Đã xác nhận',
        self::order_status_Paid => 'Đã thanh toán',
        self::order_status_Processing => 'Xử lý',
        self::order_status_Shipping => 'Đang chuyển hàng',
        self::order_status_Finish => 'Hoàn thành',
        self::order_status_Cancel => 'Hủy bỏ',
    ];

    //User
    const user_level_host = 0;
    const user_level_admin = 1;
    const user_level_client = 2;
    public static $user_level =[
        self::user_level_host => 'Admin',
        self::user_level_admin => 'Nhân viên',
        self::user_level_client => 'Khách hàng',
    ];
}