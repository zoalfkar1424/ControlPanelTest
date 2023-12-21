<?php

namespace App\Modules\Catalog\ViewModels;

use App\Modules\Catalog\Models\Catalog;

class CatalogShowVM
{

    public static function handle($Catalog)
    {
        return $Catalog;
    }

    public static function toArray(Catalog $Catalog)
    {
        return ['Catalog' => self::handle($Catalog)];
    }

    public static function toAttr(Catalog $Catalog)
    {
        return self::handle($Catalog);
    }
}
