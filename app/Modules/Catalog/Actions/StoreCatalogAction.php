<?php


namespace App\Modules\Catalog\Actions;

use App\Helpers\Helper;
use App\Modules\Catalog\DTO\CatalogDTO;
use App\Modules\Catalog\Models\Catalog;

class StoreCatalogAction
{

    public static function execute(CatalogDTO $CatalogDTO)
    {
        $Catalog = new Catalog($CatalogDTO->toArray());
        $Catalog->save();
        return Helper::createSuccessResponse(['Catalog' => $Catalog], 'Added Successfully');
    }
}
