<?php

namespace App\Modules\Auth\Log\ViewModels;


use App\Modules\Auth\Log\Models\Log;

class LogShowVM
{

    public static function handle($Catalog)
    {
        return $Catalog;
    }

    public static function toArray(Log $Catalog)
    {
        return ['Log' => self::handle($Catalog)];
    }

    public static function toAttr(Log $Catalog)
    {
        return self::handle($Catalog);
    }
}
