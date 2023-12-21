<?php

namespace App\Modules\LogType\ViewModels;

use App\Modules\LogType\Models\LogType;

class LogTypeIndexVM
{

    public static function handle()
    {
        $LogTypes = LogType::all();
        $arr = [];
        foreach ($LogTypes as $LogType) {
            $LogTypeVM = new LogTypeShowVM();
            array_push($arr, $LogTypeVM->toAttr($LogType));
        }
        return $arr;
    }

    public static function toArray()
    {
        return ['LogTypes' => self::handle()];
    }
}
