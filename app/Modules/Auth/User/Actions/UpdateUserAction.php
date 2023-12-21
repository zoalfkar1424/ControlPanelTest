<?php


namespace App\Modules\Auth\User\Actions;

use App\Modules\Auth\User\DTO\UserDTO;
use App\Modules\Auth\User\Models\User;
use App\Modules\Auth\User\Models\UserImage;
use Illuminate\Support\Facades\Auth;

class UpdateUserAction
{
    public static function execute(User $user, UserDTO $userDTO)
    {
        $user->update($userDTO->toArray());
        return $user;
    }

}
