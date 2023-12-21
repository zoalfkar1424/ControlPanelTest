<?php

namespace App\Modules\Product\Controllers;

use App\Modules\Product\Actions\DeleteProductAction;
use App\Modules\Product\Actions\StoreProductAction;
use App\Modules\Product\Actions\UpdateProductAction;
use App\Modules\Product\DataTables\ProductDataTable;
use App\Modules\Product\DTO\ProductDTO;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Requests\StoreProductRequest;
use App\Modules\Product\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\Product\ViewModels\ProductShowVM;
use App\Modules\ProductTechnicalCharacteristic\Actions\DeleteALLProductTechnicalCharacteristicByProductAction;
use App\Modules\ProductTechnicalCharacteristic\Actions\StoreProductTechnicalCharacteristicAction;
use App\Modules\ProductTechnicalCharacteristic\DTO\ProductTechnicalCharacteristicDTO;
use App\Modules\ProductTechnicalCharacteristic\Models\ProductTechnicalCharacteristic;
use App\Modules\TechnicalCharacteristic\Actions\StoreTechnicalCharacteristicAction;
use Illuminate\Http\Request;

class ProductDashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $response = ProductDataTable::toJson($request);
        $response = Helper::createSuccessDTResponse($response, '');
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $Product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $Product)
    {
        //
        $response = Helper::createSuccessResponse(ProductShowVM::toArray($Product));
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProductRequest $storeProductRequest)
    {
        $ProductDTO = ProductDTO::fromRequest($storeProductRequest);
        $Product = StoreProductAction::execute($ProductDTO);
        foreach ($ProductDTO->technicalCharacteristics_vals as $technicalCharacteristics_val)
        {
            $ProductTechnicalCharacteristicDTO = new ProductTechnicalCharacteristicDTO();
            $ProductTechnicalCharacteristicDTO->characteristic_value = $technicalCharacteristics_val['characteristic_value'];
            $ProductTechnicalCharacteristicDTO->tech_char_id = $technicalCharacteristics_val['tech_char_id'];
            $ProductTechnicalCharacteristicDTO->product_id = $Product['id'];
            StoreProductTechnicalCharacteristicAction::execute($ProductTechnicalCharacteristicDTO);
        }
        $response = Helper::createResponse($Product);
        return response()->json($response, $response['code']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductRequest $updateProductRequest, $Product)
    {
        $Product = Product::find($Product);
        DeleteALLProductTechnicalCharacteristicByProductAction::execute($Product);

        $ProductDTO = ProductDTO::fromRequestForUpdate($updateProductRequest, $Product);
        $UpdatedProduct = UpdateProductAction::execute($Product, $ProductDTO);

        foreach ($ProductDTO->technicalCharacteristics_vals as $technicalCharacteristics_val)
        {
            $ProductTechnicalCharacteristicDTO = new ProductTechnicalCharacteristicDTO();
            $ProductTechnicalCharacteristicDTO->characteristic_value = $technicalCharacteristics_val['characteristic_value'];
            $ProductTechnicalCharacteristicDTO->tech_char_id = $technicalCharacteristics_val['tech_char_id'];
            $ProductTechnicalCharacteristicDTO->product_id = $Product['id'];
            StoreProductTechnicalCharacteristicAction::execute($ProductTechnicalCharacteristicDTO);
        }
        $response = Helper::createResponse($UpdatedProduct);
        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $Product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($Product)
    {
        //
        $Product = Product::find($Product);
        DeleteALLProductTechnicalCharacteristicByProductAction::execute($Product);
        $response = Helper::createResponse(DeleteProductAction::execute($Product));
        return response()->json($response, $response['code']);
    }
}
