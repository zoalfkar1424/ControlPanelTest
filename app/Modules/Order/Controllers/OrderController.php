<?php

namespace App\Modules\Order\Controllers;

use App\Modules\Order\Actions\DeleteOrderAction;
use App\Modules\Order\Actions\StoreOrderAction;
use App\Modules\Order\Actions\UpdateOrderAction;
use App\Modules\Order\DTO\OrderDTO;
use App\Modules\Order\Models\Order;
use App\Modules\Order\Requests\StoreOrderRequest;
use App\Modules\Order\Requests\UpdateOrderRequest;
use App\Modules\Order\ViewModels\LogIndexVM;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\Order\ViewModels\LogShowVM;


class OrderController extends Controller
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
    public function store(StoreOrderRequest $storeOrderRequest)
    {
        $OrderDTO = OrderDTO::fromRequest($storeOrderRequest);
        $response = Helper::createResponse(StoreOrderAction::execute($OrderDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param Order $Order
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($Order)
    {
        //
        $Order = Order::find($Order);
        $response = Helper::createSuccessResponse(LogShowVM::toArray($Order));
        return response()->json($response, $response['code']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrderRequest $updateOrderRequest
     * @param Order $Order
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateOrderRequest $updateOrderRequest, $Order)
    {
        //
        $Order = Order::find($Order);
        $OrderDTO = OrderDTO::fromRequestForUpdate($updateOrderRequest, $Order);
        $response = Helper::createResponse(UpdateOrderAction::execute($Order, $OrderDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $Order
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($Order)
    {
        //
        $Order = Order::find($Order);
        $response = Helper::createResponse(DeleteOrderAction::execute($Order));
        return response()->json($response, $response['code']);
    }
}
