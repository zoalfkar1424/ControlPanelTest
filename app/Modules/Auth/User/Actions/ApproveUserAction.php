<?php


namespace App\Modules\Auth\User\Actions;

use App\Modules\Auth\User\DTO\UserDTO;
use App\Modules\Auth\User\Models\User;
use App\Modules\Auth\User\Models\UserImage;
use App\Modules\OauthEmail\Controllers\HandleEmailController;
use Illuminate\Support\Facades\Auth;

class ApproveUserAction
{
    public static function execute($user)
    {
        $user->update(['verified' => 1]);
        (new HandleEmailController())
            ->sendEmail($user,
                'This Email to show if you are verified',
                '<h3>Your request was approved</h3>');
        return $user;
    }

}
