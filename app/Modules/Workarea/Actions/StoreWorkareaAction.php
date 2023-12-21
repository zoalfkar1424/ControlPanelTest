<?php


namespace App\Modules\Workarea\Actions;

use App\Helpers\Helper;
use App\Modules\Workarea\DTO\WorkareaDTO;
use App\Modules\Workarea\Models\Workarea;

class StoreWorkareaAction
{

    public static function execute(WorkareaDTO $WorkareaDTO)
    {
        $Workarea = new Workarea($WorkareaDTO->toArray());
        $Workarea->save();
        return Helper::createSuccessResponse(['Workarea' => $Workarea], 'Added Successfully');
    }
}
