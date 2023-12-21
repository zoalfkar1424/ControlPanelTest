<?php


namespace App\Modules\Auth\Log\Actions;


use App\Modules\Auth\Log\Models\Log;

class DeleteLogAction
{
    public static function execute(Log $user)
    {
        $user->delete();
    }

}
