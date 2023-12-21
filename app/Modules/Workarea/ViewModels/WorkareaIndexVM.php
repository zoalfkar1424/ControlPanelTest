<?php

namespace App\Modules\Workarea\ViewModels;

use App\Modules\Workarea\Models\Workarea;

class WorkareaIndexVM
{

    public static function handle()
    {
        $Workareas = Workarea::all();
        $arr = [];
        foreach ($Workareas as $Workarea) {
            $WorkareaVM = new WorkareaShowVM();
            array_push($arr, $WorkareaVM->toAttr($Workarea));
        }
        return $arr;
    }

    public static function toArray()
    {
        return ['Workareas' => self::handle()];
    }
}
