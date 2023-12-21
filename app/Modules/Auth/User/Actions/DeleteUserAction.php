<?php


namespace App\Modules\Auth\User\Actions;


use App\Helpers\Helper;
use App\Modules\Auth\User\Models\User;

class DeleteUserAction
{
    public static function execute(User $user)
    {
        $user->delete();
        return Helper::createSuccessResponse([], 'Deleted Successfully');
    }

}
