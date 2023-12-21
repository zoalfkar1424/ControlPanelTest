<?php


namespace App\Modules\LogType\Actions;

use App\Helpers\Helper;
use App\Modules\LogType\DTO\LogTypeDTO;
use App\Modules\LogType\Models\LogType;
use Illuminate\Support\Facades\Auth;

class UpdateLogTypeAction
{
    public static function execute(LogType $LogType, LogTypeDTO $LogTypeDTO)
    {
        $LogType->update($LogTypeDTO->toArray());
        return Helper::createSuccessResponse(['LogType' => $LogType], 'Updated Successfully');
    }

}
