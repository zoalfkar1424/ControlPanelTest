<?php


namespace App\Modules\Auth\User\DTO;

use Illuminate\Support\Facades\Hash;
use Spatie\DataTransferObject\DataTransferObject;


class AuthUserDTO extends DataTransferObject
{

    /** @var string $email */
    public $email;

    /** @var string $password */
    public $password;

    /** @var boolean $remember_me */
    public $remember_me;

    public static function fromRequest($request)
    {
        return new self([
            'email' => $request['email'],
            'password' => $request['password']
        ]);
    }
}
