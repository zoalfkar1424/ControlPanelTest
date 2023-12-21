<?php

namespace App\Modules\Product\ViewModels;

use App\Modules\Product\Models\Product;

class ProductIndexVM
{

    public static function handle()
    {
        $Products = Product::all();
        $arr = [];
        foreach ($Products as $Product) {
            $ProductVM = new ProductShowVM();
            array_push($arr, $ProductVM->toAttr($Product));
        }
        return $arr;
    }

    public static function toArray()
    {
        return ['Products' => self::handle()];
    }
}
