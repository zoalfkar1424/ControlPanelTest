<?php

namespace App\Modules\Product\ViewModels;

use App\Modules\Product\Models\Product;

class ProductShowVM
{

    public static function handle($Product)
    {
        return $Product;
    }

    public static function toArray(Product $Product)
    {
        return ['Product' => self::handle($Product)];
    }

    public static function toAttr(Product $Product)
    {
        return self::handle($Product);
    }
}
