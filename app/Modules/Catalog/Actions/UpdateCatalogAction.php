<?php


namespace App\Modules\Catalog\Actions;

use App\Helpers\Helper;
use App\Modules\Catalog\DTO\CatalogDTO;
use App\Modules\Catalog\Models\Catalog;
use Illuminate\Support\Facades\Auth;

class UpdateCatalogAction
{
    public static function execute(Catalog $Catalog, CatalogDTO $CatalogDTO)
    {
        $Catalog->update($CatalogDTO->toArray());
        return Helper::createSuccessResponse(['Catalog' => $Catalog], 'Updated Successfully');
    }

}
