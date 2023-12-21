<?php


namespace App\Modules\Auth\User\Actions;

use App\Modules\Auth\User\DTO\UserDTO;
use App\Modules\Auth\User\DTO\UserUpdateNameLangCurDTO;
use App\Modules\Auth\User\Models\User;
use App\Modules\Auth\User\Models\UserImage;
use Illuminate\Support\Facades\Auth;

class UserUpdateNameLangCurAction
{
    public static function execute(UserUpdateNameLangCurDTO $userUpdateNameLangCurDTO)
    {
        $user = User::Where('id', Auth::id())->first();
        $user->update(['name' => $userUpdateNameLangCurDTO->name,
            'language_id' => $userUpdateNameLangCurDTO->language_id,
            'currency_id' => $userUpdateNameLangCurDTO->currency_id]);
        return $user;
    }

}
