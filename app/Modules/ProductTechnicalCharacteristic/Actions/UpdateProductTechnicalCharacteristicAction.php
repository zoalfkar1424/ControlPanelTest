<?php


namespace App\Modules\ProductTechnicalCharacteristic\Actions;

use App\Helpers\Helper;
use App\Modules\ProductTechnicalCharacteristic\DTO\ProductTechnicalCharacteristicDTO;
use App\Modules\ProductTechnicalCharacteristic\Models\ProductTechnicalCharacteristic;
use Illuminate\Support\Facades\Auth;

class UpdateProductTechnicalCharacteristicAction
{
    public static function execute(ProductTechnicalCharacteristic $ProductTechnicalCharacteristic, ProductTechnicalCharacteristicDTO $ProductTechnicalCharacteristicDTO)
    {
        $ProductTechnicalCharacteristic->update($ProductTechnicalCharacteristicDTO->toArray());
        return Helper::createSuccessResponse(['ProductTechnicalCharacteristic' => $ProductTechnicalCharacteristic], 'Updated Successfully');
    }

}
