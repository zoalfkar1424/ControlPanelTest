<?php


namespace App\Modules\Order\Actions;

use App\Helpers\Helper;
use App\Modules\Order\DTO\OrderDTO;
use App\Modules\Order\Models\Order;

class GenerateOrderNumAction
{

    public static function execute()
    {
        $newNum = Order::orderBy('created_at', 'desc')->get(['num'])->first();
        $newNum++;
        return $newNum;
    }
}
