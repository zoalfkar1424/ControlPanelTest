<?php


namespace App\Modules\ProductTechnicalCharacteristic\Actions;

use App\Helpers\Helper;
use App\Modules\ProductTechnicalCharacteristic\Models\ProductTechnicalCharacteristic;

class DeleteProductTechnicalCharacteristicAction
{
    public static function execute(ProductTechnicalCharacteristic $ProductTechnicalCharacteristic)
    {
        $ProductTechnicalCharacteristic->delete();
        return Helper::createSuccessResponse([], 'Deleted Successfully');
    }

}
