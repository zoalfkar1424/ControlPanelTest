<?php


namespace App\Modules\Order\Actions;

use App\Helpers\Helper;
use App\Modules\Order\DTO\OrderDTO;
use App\Modules\Order\Models\Order;

class StoreOrderAction
{

    public static function execute(OrderDTO $OrderDTO)
    {
        $OrderDTO->num = GenerateOrderNumAction::execute();
        $OrderDTO->status='created';
        $Order = new Order($OrderDTO->toArray());
        $Order->save();
        return Helper::createSuccessResponse(['Order' => $Order], 'Added Successfully');
    }
}
