<?php

namespace App\Modules\Order\Controllers;

use App\Modules\Order\Actions\DeleteOrderAction;
use App\Modules\Order\Actions\GenerateOrderNumAction;
use App\Modules\Order\Actions\StoreOrderAction;
use App\Modules\Order\Actions\UpdateOrderAction;
use App\Modules\Order\Actions\UpdateOrderStatusAction;
use App\Modules\Order\DataTables\UserDataTable;
use App\Modules\Order\DTO\OrderDTO;
use App\Modules\Order\Models\Order;
use App\Modules\Order\Requests\StoreOrderRequest;
use App\Modules\Order\Requests\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\Order\ViewModels\LogShowVM;
use App\Modules\Order\ViewModels\OrderShowVM;
use Illuminate\Http\Request;

class OrderDashboardController extends Controller
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
     * Display the specified resource.
     *
     * @param Order $Order
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Order $Order)
    {
        //
        $response = Helper::createSuccessResponse(OrderShowVM::toArray($Order));
        return response()->json($response, 200);
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateOrderRequest $updateOrderRequest, $Order)
    {
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
