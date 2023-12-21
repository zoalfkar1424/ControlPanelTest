<?php


namespace App\Modules\ProductTechnicalCharacteristic\Actions;

use App\Helpers\Helper;
use App\Modules\Product\Models\Product;
use App\Modules\ProductTechnicalCharacteristic\Models\ProductTechnicalCharacteristic;

class DeleteALLProductTechnicalCharacteristicByProductAction
{
    public static function execute(Product $Product)
    {
        $ProductTechnicalCharacteristicids = ProductTechnicalCharacteristic::where('product_id', $Product->id)->get(['id']);
        ProductTechnicalCharacteristic::destroy($ProductTechnicalCharacteristicids);
        return $Product;
    }

}
