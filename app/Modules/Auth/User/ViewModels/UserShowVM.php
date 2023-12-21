<?php

namespace App\Modules\Auth\User\ViewModels;

use App\Modules\Auth\User\Models\User;

class UserShowVM
{

    public static function handle($User)
    {
        return $User;
    }

    public static function toArray(User $User)
    {
        return ['User' => self::handle($User)];
    }

    public static function toAttr(User $User)
    {
        return self::handle($User);
    }
}
