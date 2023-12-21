<?php

namespace App\Modules\LogType\Controllers;

use App\Modules\LogType\Actions\DeleteLogTypeAction;
use App\Modules\LogType\Actions\StoreLogTypeAction;
use App\Modules\LogType\Actions\UpdateLogTypeAction;
use App\Modules\LogType\DTO\LogTypeDTO;
use App\Modules\LogType\Models\LogType;
use App\Modules\LogType\Requests\StoreLogTypeRequest;
use App\Modules\LogType\Requests\UpdateLogTypeRequest;
use App\Modules\LogType\ViewModels\LogTypeIndexVM;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\LogType\ViewModels\LogTypeShowVM;


class LogTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $response = Helper::createSuccessResponse(LogTypeIndexVM::toArray());
        return response()->json($response, $response['code']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreLogTypeRequest $storeLogTypeRequest)
    {
        $LogTypeDTO = LogTypeDTO::fromRequest($storeLogTypeRequest);
        $response = Helper::createResponse(StoreLogTypeAction::execute($LogTypeDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param LogType $LogType
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($LogType)
    {
        //
        $LogType = LogType::find($LogType);
        $response = Helper::createSuccessResponse(LogTypeShowVM::toArray($LogType));
        return response()->json($response, $response['code']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLogTypeRequest $updateLogTypeRequest
     * @param LogType $LogType
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateLogTypeRequest $updateLogTypeRequest, $LogType)
    {
        //
        $LogType = LogType::find($LogType);
        $LogTypeDTO = LogTypeDTO::fromRequestForUpdate($updateLogTypeRequest, $LogType);
        $response = Helper::createResponse(UpdateLogTypeAction::execute($LogType, $LogTypeDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LogType $LogType
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($LogType)
    {
        //
        $LogType = LogType::find($LogType);
        $response = Helper::createResponse(DeleteLogTypeAction::execute($LogType));
        return response()->json($response, $response['code']);
    }
}
