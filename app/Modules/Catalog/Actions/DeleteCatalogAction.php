<?php


namespace App\Modules\Catalog\Actions;

use App\Helpers\Helper;
use App\Modules\Catalog\Models\Catalog;

class DeleteCatalogAction
{
    public static function execute(Catalog $Catalog)
    {
        $Catalog->delete();
        return Helper::createSuccessResponse([], 'Deleted Successfully');
    }

}
