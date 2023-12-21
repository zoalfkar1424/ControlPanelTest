<?php

namespace App\Modules\Catalog\Controllers;

use App\Modules\Catalog\Actions\DeleteCatalogAction;
use App\Modules\Catalog\Actions\StoreCatalogAction;
use App\Modules\Catalog\Actions\UpdateCatalogAction;
use App\Modules\Catalog\DataTables\CatalogDataTable;
use App\Modules\Catalog\DTO\CatalogDTO;
use App\Modules\Catalog\Models\Catalog;
use App\Modules\Catalog\Requests\StoreCatalogRequest;
use App\Modules\Catalog\Requests\UpdateCatalogRequest;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\Catalog\ViewModels\CatalogShowVM;
use Illuminate\Http\Request;

class CatalogDashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $response = CatalogDataTable::toJson($request);
        $response = Helper::createSuccessDTResponse($response, '');
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Catalog $Catalog
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Catalog $Catalog)
    {
        //
        $response = Helper::createSuccessResponse(CatalogShowVM::toArray($Catalog));
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCatalogRequest $storeCatalogRequest)
    {
        $CatalogDTO = CatalogDTO::fromRequest($storeCatalogRequest);
        $response = Helper::createResponse(StoreCatalogAction::execute($CatalogDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCatalogRequest $updateCatalogRequest, $Catalog)
    {
        $Catalog = Catalog::find($Catalog);
        $CatalogDTO = CatalogDTO::fromRequestForUpdate($updateCatalogRequest, $Catalog);
        $response = Helper::createResponse(UpdateCatalogAction::execute($Catalog, $CatalogDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Catalog $Catalog
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($Catalog)
    {
        //
        $Catalog = Catalog::find($Catalog);
        $response = Helper::createResponse(DeleteCatalogAction::execute($Catalog));
        return response()->json($response, $response['code']);
    }
}
