<?php


namespace App\Modules\Auth\User\DTO;

use App\Modules\Influencer\Tier\Models\Tier;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;
use Spatie\DataTransferObject\DataTransferObject;


class UserDTO extends DataTransferObject
{

    /** @var string $name */
    public $name;

    /** @var string $email */
    public $email;


    /** @var string $password */
    public $password;

    /** @var enum $type */
    public $type;
    public static function fromRequest($request)
    {

        return new self([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['type'],
            'password' => $request['password'] ? Hash::make($request['password']) : Hash::make(Str::random(10)),
        ]);
    }

    public static function fromRequestForUpdate($request, $user)
    {
        return new self([
            'name' => isset($request['name']) ? $request['name'] : $user->name,

            'email' => isset($request['email']) ? $request['email'] : $user->email,
            'type' => isset($request['type']) ? $request['type'] : $user->type,
            'password' => isset($request['password']) ? $request['password'] : $user->password
        ]);
    }
}
