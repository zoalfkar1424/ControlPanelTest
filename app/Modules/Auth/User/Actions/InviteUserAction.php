<?php


namespace App\Modules\Auth\User\Actions;

use App\Modules\Auth\User\DTO\UserDTO;
use App\Modules\Auth\User\Models\User;
use App\Modules\OauthEmail\Controllers\HandleEmailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InviteUserAction
{
    public static function execute(User $user)
    {
        $user->status = "Invited";
        $user->update();
    }

}
