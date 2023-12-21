<?php

namespace App\Modules\Auth\User\Controllers;

use App\Modules\Auth\User\Actions\AcceptMatchRequestAction;
use App\Modules\Auth\User\Actions\DeclineMatchRequestAction;
use App\Modules\Auth\User\Actions\SendMatchRequestAction;
use App\Modules\Auth\User\Actions\StoreUserAction;
use App\Modules\Auth\User\Actions\DeleteUserAction;
use App\Modules\Auth\User\Actions\UpdateUserAction;
use App\Modules\Auth\User\DTO\UserDTO;
use App\Modules\Auth\User\Models\User;
use App\Modules\Auth\User\Requests\StoreUserRequest;
use App\Modules\Auth\User\Requests\UpdateUserRequest;
use App\Modules\Auth\User\ViewModels\UserIndexVM;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\Auth\User\ViewModels\UserShowVM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $response = Helper::createSuccessResponse(UserIndexVM::toArray());
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * //  * @param StoreUserRequest $storeUserRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $storeUserRequest)
    {
        //
        $UserDTO = UserDTO::fromRequest($storeUserRequest);
        $response = Helper::createResponse(StoreUserAction::execute($UserDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param User $User
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        //
        $response = Helper::createSuccessResponse(UserShowVM::toArray($user));
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $updateUserRequest
     * @param User $User
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $updateUserRequest)
    {
        //
        $user = User::find(Auth::id());
        $userDTO = UserDTO::fromRequestForUpdate($updateUserRequest, $user);
        $response = Helper::createSuccessResponse(UserShowVM::toArray(UpdateUserAction::execute($user, $userDTO)));
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $User
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        //
        DeleteUserAction::execute($user);
        return response()->json(['O_Msg' => 'Item Deleted'], 200);
    }
}
