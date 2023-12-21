<?php

namespace App\Modules\TechnicalCharacteristic\Controllers;

use App\Modules\TechnicalCharacteristic\Actions\DeleteTechnicalCharacteristicAction;
use App\Modules\TechnicalCharacteristic\Actions\StoreTechnicalCharacteristicAction;
use App\Modules\TechnicalCharacteristic\Actions\UpdateTechnicalCharacteristicAction;
use App\Modules\TechnicalCharacteristic\DTO\TechnicalCharacteristicDTO;
use App\Modules\TechnicalCharacteristic\Models\TechnicalCharacteristic;
use App\Modules\TechnicalCharacteristic\Requests\StoreTechnicalCharacteristicRequest;
use App\Modules\TechnicalCharacteristic\Requests\UpdateTechnicalCharacteristicRequest;
use App\Modules\TechnicalCharacteristic\ViewModels\TechnicalCharacteristicIndexVM;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\TechnicalCharacteristic\ViewModels\TechnicalCharacteristicShowVM;


class TechnicalCharacteristicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $response = Helper::createSuccessResponse(TechnicalCharacteristicIndexVM::toArray());
        return response()->json($response, $response['code']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTechnicalCharacteristicRequest $storeTechnicalCharacteristicRequest)
    {
        $TechnicalCharacteristicDTO = TechnicalCharacteristicDTO::fromRequest($storeTechnicalCharacteristicRequest);
        $response = Helper::createResponse(StoreTechnicalCharacteristicAction::execute($TechnicalCharacteristicDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param TechnicalCharacteristic $TechnicalCharacteristic
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($TechnicalCharacteristic)
    {
        //
        $TechnicalCharacteristic = TechnicalCharacteristic::find($TechnicalCharacteristic);
        $response = Helper::createSuccessResponse(TechnicalCharacteristicShowVM::toArray($TechnicalCharacteristic));
        return response()->json($response, $response['code']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTechnicalCharacteristicRequest $updateTechnicalCharacteristicRequest
     * @param TechnicalCharacteristic $TechnicalCharacteristic
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTechnicalCharacteristicRequest $updateTechnicalCharacteristicRequest, $TechnicalCharacteristic)
    {
        //
        $TechnicalCharacteristic = TechnicalCharacteristic::find($TechnicalCharacteristic);
        $TechnicalCharacteristicDTO = TechnicalCharacteristicDTO::fromRequestForUpdate($updateTechnicalCharacteristicRequest, $TechnicalCharacteristic);
        $response = Helper::createResponse(UpdateTechnicalCharacteristicAction::execute($TechnicalCharacteristic, $TechnicalCharacteristicDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TechnicalCharacteristic $TechnicalCharacteristic
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($TechnicalCharacteristic)
    {
        //
        $TechnicalCharacteristic = TechnicalCharacteristic::find($TechnicalCharacteristic);
        $response = Helper::createResponse(DeleteTechnicalCharacteristicAction::execute($TechnicalCharacteristic));
        return response()->json($response, $response['code']);
    }
}
