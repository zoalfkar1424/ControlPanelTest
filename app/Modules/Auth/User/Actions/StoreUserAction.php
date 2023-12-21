<?php


namespace App\Modules\Auth\User\Actions;

use App\Helpers\Helper;
use App\Modules\Auth\User\DTO\UserDTO;
use App\Modules\Auth\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StoreUserAction
{

    public static function execute(UserDTO $userDTO)
    {
        $user = new User($userDTO->toArray());
        $user->save();
        return Helper::createSuccessResponse(['Catalog' => $user], 'Added Successfully');
    }
}
