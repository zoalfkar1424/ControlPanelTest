<?php

namespace App\Modules\Order\ViewModels;

use App\Modules\Order\Models\Order;

class OrderIndexVM
{

    public static function handle()
    {
        $Orders = Order::all();
        $arr = [];
        foreach ($Orders as $Order) {
            $OrderVM = new OrderShowVM();
            array_push($arr, $OrderVM->toAttr($Order));
        }
        return $arr;
    }

    public static function toArray()
    {
        return ['Orders' => self::handle()];
    }
}
