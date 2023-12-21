<?php

namespace App\Modules\ProductTechnicalCharacteristic\ViewModels;

use App\Modules\ProductTechnicalCharacteristic\Models\ProductTechnicalCharacteristic;

class ProductTechnicalCharacteristicShowVM
{

    public static function handle($ProductTechnicalCharacteristic)
    {
        return $ProductTechnicalCharacteristic;
    }

    public static function toArray(ProductTechnicalCharacteristic $ProductTechnicalCharacteristic)
    {
        return ['ProductTechnicalCharacteristic' => self::handle($ProductTechnicalCharacteristic)];
    }

    public static function toAttr(ProductTechnicalCharacteristic $ProductTechnicalCharacteristic)
    {
        return self::handle($ProductTechnicalCharacteristic);
    }
}
