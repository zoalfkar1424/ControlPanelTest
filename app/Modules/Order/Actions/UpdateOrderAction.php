<?php


namespace App\Modules\Order\Actions;

use App\Helpers\Helper;
use App\Modules\Order\DTO\OrderDTO;
use App\Modules\Order\Models\Order;
use Illuminate\Support\Facades\Auth;

class UpdateOrderAction
{
    public static function execute(Order $Order, OrderDTO $OrderDTO)
    {
        $Order->update($OrderDTO->toArray());
        return Helper::createSuccessResponse(['Order' => $Order], 'Updated Successfully');
    }

}
