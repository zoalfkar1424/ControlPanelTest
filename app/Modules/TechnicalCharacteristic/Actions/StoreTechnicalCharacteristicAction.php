<?php


namespace App\Modules\TechnicalCharacteristic\Actions;

use App\Helpers\Helper;
use App\Modules\Product\Models\Product;
use App\Modules\TechnicalCharacteristic\DTO\TechnicalCharacteristicDTO;
use App\Modules\TechnicalCharacteristic\Models\TechnicalCharacteristic;

class StoreTechnicalCharacteristicAction
{

    public static function execute(Product $Product,TechnicalCharacteristicDTO $TechnicalCharacteristicDTO)
    {
        $TechnicalCharacteristic = new TechnicalCharacteristic($TechnicalCharacteristicDTO->toArray());
        $TechnicalCharacteristic->save();
        return Helper::createSuccessResponse(['TechnicalCharacteristic' => $TechnicalCharacteristic], 'Added Successfully');
    }
}
