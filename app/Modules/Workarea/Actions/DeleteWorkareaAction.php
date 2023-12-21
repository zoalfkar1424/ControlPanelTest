<?php


namespace App\Modules\Workarea\Actions;

use App\Helpers\Helper;
use App\Modules\Workarea\Models\Workarea;

class DeleteWorkareaAction
{
    public static function execute(Workarea $Workarea)
    {
        $Workarea->delete();
        return Helper::createSuccessResponse([], 'Deleted Successfully');
    }

}
