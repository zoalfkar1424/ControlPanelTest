<?php

namespace App\Modules\ProductTechnicalCharacteristic\Controllers;

use App\Modules\ProductTechnicalCharacteristic\Actions\DeleteProductTechnicalCharacteristicAction;
use App\Modules\ProductTechnicalCharacteristic\Actions\StoreProductTechnicalCharacteristicAction;
use App\Modules\ProductTechnicalCharacteristic\Actions\UpdateProductTechnicalCharacteristicAction;
use App\Modules\ProductTechnicalCharacteristic\DataTables\ProductTechnicalCharacteristicDataTable;
use App\Modules\ProductTechnicalCharacteristic\DTO\ProductTechnicalCharacteristicDTO;
use App\Modules\ProductTechnicalCharacteristic\Models\ProductTechnicalCharacteristic;
use App\Modules\ProductTechnicalCharacteristic\Requests\StoreProductTechnicalCharacteristicRequest;
use App\Modules\ProductTechnicalCharacteristic\Requests\UpdateProductTechnicalCharacteristicRequest;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\ProductTechnicalCharacteristic\ViewModels\ProductTechnicalCharacteristicShowVM;
use Illuminate\Http\Request;

class ProductTechnicalCharacteristicDashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $response = ProductTechnicalCharacteristicDataTable::toJson($request);
        $response = Helper::createSuccessDTResponse($response, '');
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param ProductTechnicalCharacteristic $ProductTechnicalCharacteristic
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ProductTechnicalCharacteristic $ProductTechnicalCharacteristic)
    {
        //
        $response = Helper::createSuccessResponse(ProductTechnicalCharacteristicShowVM::toArray($ProductTechnicalCharacteristic));
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProductTechnicalCharacteristicRequest $storeProductTechnicalCharacteristicRequest)
    {
        $ProductTechnicalCharacteristicDTO = ProductTechnicalCharacteristicDTO::fromRequest($storeProductTechnicalCharacteristicRequest);
        $response = Helper::createResponse(StoreProductTechnicalCharacteristicAction::execute($ProductTechnicalCharacteristicDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductTechnicalCharacteristicRequest $updateProductTechnicalCharacteristicRequest, $ProductTechnicalCharacteristic)
    {
        $ProductTechnicalCharacteristic = ProductTechnicalCharacteristic::find($ProductTechnicalCharacteristic);
        $ProductTechnicalCharacteristicDTO = ProductTechnicalCharacteristicDTO::fromRequestForUpdate($updateProductTechnicalCharacteristicRequest, $ProductTechnicalCharacteristic);
        $response = Helper::createResponse(UpdateProductTechnicalCharacteristicAction::execute($ProductTechnicalCharacteristic, $ProductTechnicalCharacteristicDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductTechnicalCharacteristic $ProductTechnicalCharacteristic
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($ProductTechnicalCharacteristic)
    {
        //
        $ProductTechnicalCharacteristic = ProductTechnicalCharacteristic::find($ProductTechnicalCharacteristic);
        $response = Helper::createResponse(DeleteProductTechnicalCharacteristicAction::execute($ProductTechnicalCharacteristic));
        return response()->json($response, $response['code']);
    }
}
