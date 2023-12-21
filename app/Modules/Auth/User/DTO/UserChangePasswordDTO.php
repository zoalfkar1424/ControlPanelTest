<?php


namespace App\Modules\Auth\User\DTO;

use Illuminate\Support\Facades\Hash;
use Spatie\DataTransferObject\DataTransferObject;


class UserChangePasswordDTO extends DataTransferObject
{
    /** @var string $password */
    public $password;

    /** @var string $new_password */
    public $new_password;

    public static function fromRequest($request)
    {
        return new self([
            'password' => $request['password'],
            'new_password' => $request['new_password'],
        ]);
    }

    public static function fromRequestForUpdate($request, $user)
    {
        return new self([
            'password' => isset($request['password']) ? Hash::make($request['password']) : $user->password,
        ]);
    }
}
