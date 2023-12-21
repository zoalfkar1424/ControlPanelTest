<?php

namespace App\Modules\Auth\User\Controllers;

use App\Modules\Auth\Log\Actions\StoreLogAction;
use App\Modules\Auth\User\Actions\StoreUserAction;
use App\Modules\Auth\User\Actions\DeleteUserAction;
use App\Modules\Auth\User\Actions\UpdateUserAction;
use App\Modules\Auth\User\DataTables\UserDataTable;
use App\Modules\Auth\User\DTO\UserDTO;
use App\Modules\Auth\User\Models\User;
use App\Modules\Auth\User\Requests\StoreUserRequest;
use App\Modules\Auth\User\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\Auth\User\ViewModels\UserShowVM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserDashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $response = UserDataTable::toJson($request);
        $response = Helper::createSuccessDTResponse($response, '');
        return response()->json($response, 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $storeUserRequest)
    {
        //dd($storeUserRequest);
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
    public function show($user)
    {
        //
        $user = User::withTrashed()->find($user);
        $response = Helper::createSuccessResponse(UserShowVM::toArray($user));
        return response()->json($response, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(UpdateUserRequest $updateUserRequest, $user)
    {
        $user = User::find($user);
        $userDTO = UserDTO::fromRequestForUpdate($updateUserRequest, $user);
        $response = Helper::createResponse(UpdateUserAction::execute($user, $userDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $User
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($user)
    {
        //
        $user = User::find($user);
        $response = Helper::createResponse(DeleteUserAction::execute($user));
        return response()->json($response, $response['code']);
    }
}
