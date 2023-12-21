<?php


namespace App\Modules\TechnicalCharacteristic\Actions;

use App\Helpers\Helper;
use App\Modules\TechnicalCharacteristic\DTO\TechnicalCharacteristicDTO;
use App\Modules\TechnicalCharacteristic\Models\TechnicalCharacteristic;
use Illuminate\Support\Facades\Auth;

class UpdateTechnicalCharacteristicAction
{
    public static function execute(TechnicalCharacteristic $TechnicalCharacteristic, TechnicalCharacteristicDTO $TechnicalCharacteristicDTO)
    {
        $TechnicalCharacteristic->update($TechnicalCharacteristicDTO->toArray());
        return Helper::createSuccessResponse(['TechnicalCharacteristic' => $TechnicalCharacteristic], 'Updated Successfully');
    }

}
