<?php

namespace App\Modules\Log\Controllers;

use App\Modules\Log\Actions\DeleteLogAction;
use App\Modules\Log\Actions\StoreLogAction;
use App\Modules\Log\Actions\UpdateLogAction;
use App\Modules\Log\DTO\LogDTO;
use App\Modules\Log\Models\Log;
use App\Modules\Log\Requests\StoreLogRequest;
use App\Modules\Log\Requests\UpdateLogRequest;
use App\Modules\Log\ViewModels\LogIndexVM;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\Log\ViewModels\LogShowVM;


class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $response = Helper::createSuccessResponse(LogIndexVM::toArray());
        return response()->json($response, $response['code']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreLogRequest $storeLogRequest)
    {
        $LogDTO = LogDTO::fromRequest($storeLogRequest);
        $response = Helper::createResponse(StoreLogAction::execute($LogDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param Log $Log
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($Log)
    {
        //
        $Log = Log::find($Log);
        $response = Helper::createSuccessResponse(LogShowVM::toArray($Log));
        return response()->json($response, $response['code']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLogRequest $updateLogRequest
     * @param Log $Log
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateLogRequest $updateLogRequest, $Log)
    {
        //
        $Log = Log::find($Log);
        $LogDTO = LogDTO::fromRequestForUpdate($updateLogRequest, $Log);
        $response = Helper::createResponse(UpdateLogAction::execute($Log, $LogDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Log $Log
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($Log)
    {
        //
        $Log = Log::find($Log);
        $response = Helper::createResponse(DeleteLogAction::execute($Log));
        return response()->json($response, $response['code']);
    }
}
