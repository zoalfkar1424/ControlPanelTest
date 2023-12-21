<?php

namespace App\Modules\TechnicalCharacteristic\ViewModels;

use App\Modules\TechnicalCharacteristic\Models\TechnicalCharacteristic;

class TechnicalCharacteristicIndexVM
{

    public static function handle()
    {
        $TechnicalCharacteristics = TechnicalCharacteristic::all();
        $arr = [];
        foreach ($TechnicalCharacteristics as $TechnicalCharacteristic) {
            $TechnicalCharacteristicVM = new TechnicalCharacteristicShowVM();
            array_push($arr, $TechnicalCharacteristicVM->toAttr($TechnicalCharacteristic));
        }
        return $arr;
    }

    public static function toArray()
    {
        return ['TechnicalCharacteristics' => self::handle()];
    }
}
