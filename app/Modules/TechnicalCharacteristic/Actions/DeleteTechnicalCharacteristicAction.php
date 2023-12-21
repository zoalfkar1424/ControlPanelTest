<?php


namespace App\Modules\TechnicalCharacteristic\Actions;

use App\Helpers\Helper;
use App\Modules\TechnicalCharacteristic\Models\TechnicalCharacteristic;

class DeleteTechnicalCharacteristicAction
{
    public static function execute(TechnicalCharacteristic $TechnicalCharacteristic)
    {
        $TechnicalCharacteristic->delete();
        return Helper::createSuccessResponse([], 'Deleted Successfully');
    }

}
