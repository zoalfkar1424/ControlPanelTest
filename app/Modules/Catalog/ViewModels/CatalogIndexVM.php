<?php

namespace App\Modules\Catalog\ViewModels;

use App\Modules\Catalog\Models\Catalog;

class CatalogIndexVM
{

    public static function handle()
    {
        $Catalogs = Catalog::all();
        $arr = [];
        foreach ($Catalogs as $Catalog) {
            $CatalogVM = new CatalogShowVM();
            array_push($arr, $CatalogVM->toAttr($Catalog));
        }
        return $arr;
    }

    public static function toArray()
    {
        return ['Catalogs' => self::handle()];
    }
}
