<?php


namespace App\Modules\Product\Actions;

use App\Helpers\Helper;
use App\Modules\Product\Models\Product;

class DeleteProductAction
{
    public static function execute(Product $Product)
    {
        $Product->delete();
        return Helper::createSuccessResponse([], 'Deleted Successfully');
    }

}
