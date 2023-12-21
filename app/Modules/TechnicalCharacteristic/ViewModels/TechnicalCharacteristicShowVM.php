<?php

namespace App\Modules\TechnicalCharacteristic\ViewModels;

use App\Modules\TechnicalCharacteristic\Models\TechnicalCharacteristic;

class TechnicalCharacteristicShowVM
{

    public static function handle($TechnicalCharacteristic)
    {
        return $TechnicalCharacteristic;
    }

    public static function toArray(TechnicalCharacteristic $TechnicalCharacteristic)
    {
        return ['TechnicalCharacteristic' => self::handle($TechnicalCharacteristic)];
    }

    public static function toAttr(TechnicalCharacteristic $TechnicalCharacteristic)
    {
        return self::handle($TechnicalCharacteristic);
    }
}
