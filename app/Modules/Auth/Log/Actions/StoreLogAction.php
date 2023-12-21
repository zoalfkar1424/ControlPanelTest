<?php


namespace App\Modules\Auth\Log\Actions;

use App\Modules\Auth\KYC\Controllers\KycController;
use App\Modules\Auth\Log\DTO\LogDTO;
use App\Modules\Auth\Log\Models\Log;
use App\Modules\OauthEmail\Controllers\HandleEmailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StoreLogAction
{

    public static function execute($arr)
    {
        $log = new Log($arr);
        $log->save();
        return $log;
    }
}
