<?php


namespace App\Modules\Product\Actions;

use App\Helpers\Helper;
use App\Modules\Product\DTO\ProductDTO;
use App\Modules\Product\Models\Product;
use Illuminate\Support\Facades\Auth;

class UpdateProductAction
{
    public static function execute(Product $Product, ProductDTO $ProductDTO)
    {
        $Product->update($ProductDTO->toArray());
        return $Product;
    }

}
