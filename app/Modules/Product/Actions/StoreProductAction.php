<?php


namespace App\Modules\Product\Actions;

use App\Helpers\Helper;
use App\Modules\Product\DTO\ProductDTO;
use App\Modules\Product\Models\Product;

class StoreProductAction
{

    public static function execute(ProductDTO $ProductDTO)
    {
        $Product = new Product($ProductDTO->toArray());
        $Product->save();
        return $Product;
    }
}
