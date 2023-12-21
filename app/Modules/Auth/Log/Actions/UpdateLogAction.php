<?php


namespace App\Modules\Auth\Log\Actions;

use App\Modules\Auth\Log\DTO\LogDTO;
use App\Modules\Auth\Log\Models\Log;
use App\Modules\Auth\Log\Models\LogImage;
use Illuminate\Support\Facades\Auth;

class UpdateLogAction
{
    public static function execute(Log $user, LogDTO $userDTO)
    {
        $user->update($userDTO->toArray());
//        $user->languages()->sync($userDTO->languages);
//        $user->images()->delete();
//        $arr = [];
//        foreach ($userDTO->images as $image) {
//            $arr[] = new LogImage(['path' => $image]);
//        }
//        $user->images()->saveMany($arr);
        return $user;
    }

}
