<?php


namespace App\Modules\Auth\User\Actions;

use App\Modules\Auth\User\DTO\UserDTO;
use App\Modules\Auth\User\Models\User;
use Illuminate\Support\Facades\Auth;

class UpdateUserPlaylistFormAction
{
    public static function execute(User $user, $userDTO)
    {
        $user->update($userDTO->toArray());
        return $user;
    }

}
