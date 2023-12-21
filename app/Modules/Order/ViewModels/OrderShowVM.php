<?php

namespace App\Modules\Order\ViewModels;

use App\Modules\Order\Models\Order;

class OrderShowVM
{

    public static function handle($Order)
    {
        return $Order;
    }

    public static function toArray(Order $Order)
    {
        return ['Order' => self::handle($Order)];
    }

    public static function toAttr(Order $Order)
    {
        return self::handle($Order);
    }
}
