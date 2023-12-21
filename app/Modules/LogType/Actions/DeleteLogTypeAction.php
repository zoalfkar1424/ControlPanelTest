<?php


namespace App\Modules\LogType\Actions;

use App\Helpers\Helper;
use App\Modules\LogType\Models\LogType;

class DeleteLogTypeAction
{
    public static function execute(LogType $LogType)
    {
        $LogType->delete();
        return Helper::createSuccessResponse([], 'Deleted Successfully');
    }

}
