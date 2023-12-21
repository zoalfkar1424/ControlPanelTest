<?php

namespace App\Modules\ProductTechnicalCharacteristic\ViewModels;

use App\Modules\ProductTechnicalCharacteristic\Models\ProductTechnicalCharacteristic;

class ProductTechnicalCharacteristicIndexVM
{

    public static function handle()
    {
        $ProductTechnicalCharacteristics = ProductTechnicalCharacteristic::all();
        $arr = [];
        foreach ($ProductTechnicalCharacteristics as $ProductTechnicalCharacteristic) {
            $ProductTechnicalCharacteristicVM = new ProductTechnicalCharacteristicShowVM();
            array_push($arr, $ProductTechnicalCharacteristicVM->toAttr($ProductTechnicalCharacteristic));
        }
        return $arr;
    }

    public static function toArray()
    {
        return ['ProductTechnicalCharacteristics' => self::handle()];
    }
}
