<?php


namespace App\Modules\Auth\User\Actions;

use App\Helpers\Helper;
use App\Modules\Auth\User\DTO\UserDTO;
use App\Modules\Auth\User\Models\MatchRequest;
use App\Modules\Auth\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SendMatchRequestAction
{
    public static function execute(User $user, $request)
    {
        if ($user->id !== Auth::id()) {
            $exists = MatchRequest::where(function ($query) use ($user) {
                $query->where('request_from', Auth::id())->where('request_to', $user->id);
            })
//                ->orWhere(function ($query) use ($user) {
//                    $query->where('request_from', $user->id)->where('request_to', Auth::id());
//                })
                ->first();
            if (!$exists) {
                $otherUserAccepted = MatchRequest::Where(function ($query) use ($user) {
                    $query->where('request_from', $user->id)->where('request_to', Auth::id())->whereNull('status');
                })
                    ->first();
                $matchRequest = MatchRequest::create([
                    'request_from' => Auth::id(),
                    'request_to' => $user->id,
                    'status' => $request->status === 0 ? '0' : null
                ]);
                $matchRequest->boom = $request->status === 0 ? false : isset($otherUserAccepted->id);
                $response = Helper::createSuccessResponse($matchRequest, 'success');
                $response = response()->json($response, 200);
            } else {
                $response = Helper::createErrorResponse([], 'Match already exists');
                $response = response()->json($response, 500);
            }
        } else {
            $response = Helper::createErrorResponse([], 'User cannot match himself');
            $response = response()->json($response, 500);
        }
        return $response;
    }

}
