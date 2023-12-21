<?php


namespace App\Modules\Order\Actions;

use App\Helpers\Helper;
use App\Modules\Order\Models\Order;

class DeleteOrderAction
{
    public static function execute(Order $Order)
    {
        $Order->delete();
        return Helper::createSuccessResponse([], 'Deleted Successfully');
    }

}
