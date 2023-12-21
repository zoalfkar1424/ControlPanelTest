<?php


namespace App\Modules\ProductTechnicalCharacteristic\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ProductTechnicalCharacteristicDTO extends DataTransferObject
{

    /** @var string $product_id */
    public $product_id;

    /** @var string $tech_char_id*/
    public $tech_char_id;

    /** @var string $characteristic_value */
    public $characteristic_value;

    public static function fromRequest($request)
    {
        return new self([
            'product_id' => $request['product_id'],
            'tech_char_id' => $request['tech_char_id'],
            'characteristic_value' => $request['characteristic_value']
        ]);
    }

    public static function fromRequestForUpdate($request, $ProductTechnicalCharacteristic)
    {
        return new self([
            'product_id' => isset($request['product_id']) ? $request['product_id'] : $ProductTechnicalCharacteristic->product_id,
            'tech_char_id' => isset($request['tech_char_id']) ? $request['tech_char_id'] : $ProductTechnicalCharacteristic->tech_char_id,
            'characteristic_value' => isset($request['characteristic_value']) ? $request['characteristic_value'] : $ProductTechnicalCharacteristic->characteristic_value
        ]);
    }
}
