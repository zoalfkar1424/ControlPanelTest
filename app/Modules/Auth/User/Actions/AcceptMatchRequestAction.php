<?php


namespace App\Modules\Auth\User\Actions;

use App\Helpers\Helper;
use App\Modules\Auth\User\DTO\UserDTO;
use App\Modules\Auth\User\Models\MatchRequest;
use App\Modules\Auth\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AcceptMatchRequestAction
{
    public static function execute(User $user)
    {
        $exists = MatchRequest::where(function ($query) use ($user) {
            $query->where('request_from', Auth::id())->where('request_to', $user->id)->whereNull('status');
        })->orWhere(function ($query) use ($user) {
            $query->where('request_from', $user->id)->where('request_to', Auth::id())->whereNull('status');
        })
            ->first();
        if ($exists && $exists->request_to === Auth::id()) {
            $exists->update(['status' => '2']);
            $response = Helper::createSuccessResponse($exists, 'success');
            $response = response()->json($response, 200);
        } else {
            $response = Helper::createErrorResponse([], 'Match not exists');
            $response = response()->json($response, 500);
        }
        return $response;
    }
}
