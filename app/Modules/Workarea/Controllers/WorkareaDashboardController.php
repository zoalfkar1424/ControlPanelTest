<?php

namespace App\Modules\Workarea\Controllers;

use App\Modules\Workarea\Actions\DeleteWorkareaAction;
use App\Modules\Workarea\Actions\StoreWorkareaAction;
use App\Modules\Workarea\Actions\UpdateWorkareaAction;
use App\Modules\Workarea\DataTables\WorkareaDataTable;
use App\Modules\Workarea\DTO\WorkareaDTO;
use App\Modules\Workarea\Models\Workarea;
use App\Modules\Workarea\Requests\StoreWorkareaRequest;
use App\Modules\Workarea\Requests\UpdateWorkareaRequest;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\Workarea\ViewModels\WorkareaShowVM;
use Illuminate\Http\Request;

class WorkareaDashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $response = WorkareaDataTable::toJson($request);
        $response = Helper::createSuccessDTResponse($response, '');
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Workarea $Workarea
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Workarea $Workarea)
    {
        //
        $response = Helper::createSuccessResponse(WorkareaShowVM::toArray($Workarea));
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreWorkareaRequest $storeWorkareaRequest)
    {
        $WorkareaDTO = WorkareaDTO::fromRequest($storeWorkareaRequest);
        $response = Helper::createResponse(StoreWorkareaAction::execute($WorkareaDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateWorkareaRequest $updateWorkareaRequest, $Workarea)
    {
        $Workarea = Workarea::find($Workarea);
        $WorkareaDTO = WorkareaDTO::fromRequestForUpdate($updateWorkareaRequest, $Workarea);
        $response = Helper::createResponse(UpdateWorkareaAction::execute($Workarea, $WorkareaDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Workarea $Workarea
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($Workarea)
    {
        //
        $Workarea = Workarea::find($Workarea);
        $response = Helper::createResponse(DeleteWorkareaAction::execute($Workarea));
        return response()->json($response, $response['code']);
    }
}
