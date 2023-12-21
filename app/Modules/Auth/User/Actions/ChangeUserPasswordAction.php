<?php


namespace App\Modules\Auth\User\Actions;

use App\Modules\Auth\User\DTO\UserChangePasswordDTO;
use App\Modules\Auth\User\DTO\UserDTO;
use App\Modules\Auth\User\Models\User;
use App\Modules\Auth\User\Models\UserImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangeUserPasswordAction
{
    public static function execute(UserChangePasswordDTO $userChangePasswordDTO)
    {
        //$id = Auth::user()->id;
//        $id = 1;
        $user = User::find(Auth::id());
        if (Hash::check($userChangePasswordDTO->password, $user->password)) {
            $user->update(['password' => Hash::make($userChangePasswordDTO->new_password)]);
            return $user;
        }
        return false;

    }
    /*if ($user->password == $password) {
        $user->update(['password' => $new_password]);
        return $user;
    } else {
        return "password is wrong";
    }
    $new_password = Hash::make($userChangePasswordDTO->new_password);
    $password = Hash::make($userChangePasswordDTO->password);
    //$new_password = $userChangePasswordDTO->new_password;
    //$password = $userChangePasswordDTO->password;
    dd($password);
*/

}
