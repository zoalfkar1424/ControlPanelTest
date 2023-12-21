<?php


namespace App\Modules\LogType\Actions;

use App\Helpers\Helper;
use App\Modules\LogType\DTO\LogTypeDTO;
use App\Modules\LogType\Models\LogType;

class StoreLogTypeAction
{

    public static function execute(LogTypeDTO $LogTypeDTO)
    {
        $LogType = new LogType($LogTypeDTO->toArray());
        $LogType->save();
        return Helper::createSuccessResponse(['LogType' => $LogType], 'Added Successfully');
    }
}
