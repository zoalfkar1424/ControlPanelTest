<?php


namespace App\Modules\ProductTechnicalCharacteristic\Actions;

use App\Helpers\Helper;
use App\Modules\Product\Models\Product;
use App\Modules\ProductTechnicalCharacteristic\DTO\ProductTechnicalCharacteristicDTO;
use App\Modules\ProductTechnicalCharacteristic\Models\ProductTechnicalCharacteristic;

class StoreProductTechnicalCharacteristicAction
{

    public static function execute(ProductTechnicalCharacteristicDTO $ProductTechnicalCharacteristicDTO)
    {
        $ProductTechnicalCharacteristic = new ProductTechnicalCharacteristic($ProductTechnicalCharacteristicDTO->toArray());
        $ProductTechnicalCharacteristic->save();
        return Helper::createSuccessResponse(['ProductTechnicalCharacteristic' => $ProductTechnicalCharacteristic], 'Added Successfully');
    }
}
