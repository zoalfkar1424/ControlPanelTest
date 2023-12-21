<?php

namespace App\Modules\Workarea\ViewModels;

use App\Modules\Workarea\Models\Workarea;

class WorkareaShowVM
{

    public static function handle($Workarea)
    {
        return $Workarea;
    }

    public static function toArray(Workarea $Workarea)
    {
        return ['Workarea' => self::handle($Workarea)];
    }

    public static function toAttr(Workarea $Workarea)
    {
        return self::handle($Workarea);
    }
}
