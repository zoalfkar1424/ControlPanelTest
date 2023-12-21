<?php


namespace App\Modules\Order\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class OrderDTO extends DataTransferObject
{

    /** @var enum $status */
    public $status;

    /** @var int $product_id */
    public $product_id;


    /** @var float $quantity */
    public $quantity;


    /** @var int $user_id */
    public $user_id;


    /** @var int $num */
    public $num;



    public static function fromRequest($request)
    {
        return new self([
            'status' => $request['status'],
            'product_id' => $request['product_id'],
            'quantity' => $request['quantity'],
            'user_id' => $request['user_id'],
            'num'=> $request['num']
        ]);
    }

    public static function fromRequestForUpdate($request, $Order)
    {
        return new self([
            'status' => isset($request['status']) ? $request['status'] : $Order->status,
            'product_id' => isset($request['product_id']) ? $request['product_id'] : $Order->product_id,
            'quantity' => isset($request['quantity']) ? $request['quantity'] : $Order->quantity,
            'user_id' => isset($request['user_id']) ? $request['user_id'] : $Order->user_id,
            'num' => isset($request['num']) ? $request['num'] : $Order->num
        ]);
    }
}
