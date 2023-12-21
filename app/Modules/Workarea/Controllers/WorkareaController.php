<?php

namespace App\Modules\Workarea\Controllers;

use App\Modules\Workarea\Actions\DeleteWorkareaAction;
use App\Modules\Workarea\Actions\StoreWorkareaAction;
use App\Modules\Workarea\Actions\UpdateWorkareaAction;
use App\Modules\Workarea\DTO\WorkareaDTO;
use App\Modules\Workarea\Models\Workarea;
use App\Modules\Workarea\Requests\StoreWorkareaRequest;
use App\Modules\Workarea\Requests\UpdateWorkareaRequest;
use App\Modules\Workarea\ViewModels\WorkareaIndexVM;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\Workarea\ViewModels\WorkareaShowVM;


class WorkareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $response = Helper::createSuccessResponse(WorkareaIndexVM::toArray());
        return response()->json($response, $response['code']);
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
     * Display the specified resource.
     *
     * @param Workarea $Workarea
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($Workarea)
    {
        //
        $Workarea = Workarea::find($Workarea);
        $response = Helper::createSuccessResponse(WorkareaShowVM::toArray($Workarea));
        return response()->json($response, $response['code']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWorkareaRequest $updateWorkareaRequest
     * @param Workarea $Workarea
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateWorkareaRequest $updateWorkareaRequest, $Workarea)
    {
        //
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
