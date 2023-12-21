<?php


namespace App\Modules\Workarea\Actions;

use App\Helpers\Helper;
use App\Modules\Workarea\DTO\WorkareaDTO;
use App\Modules\Workarea\Models\Workarea;
use Illuminate\Support\Facades\Auth;

class UpdateWorkareaAction
{
    public static function execute(Workarea $Workarea, WorkareaDTO $WorkareaDTO)
    {
        $Workarea->update($WorkareaDTO->toArray());
        return Helper::createSuccessResponse(['Workarea' => $Workarea], 'Updated Successfully');
    }

}
