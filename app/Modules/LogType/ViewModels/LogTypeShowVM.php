<?php

namespace App\Modules\LogType\ViewModels;

use App\Modules\LogType\Models\LogType;

class LogTypeShowVM
{

    public static function handle($LogType)
    {
        return $LogType;
    }

    public static function toArray(LogType $LogType)
    {
        return ['LogType' => self::handle($LogType)];
    }

    public static function toAttr(LogType $LogType)
    {
        return self::handle($LogType);
    }
}
