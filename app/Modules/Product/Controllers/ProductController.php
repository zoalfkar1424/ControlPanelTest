<?php

namespace App\Modules\Product\Controllers;

use App\Modules\Product\Actions\DeleteProductAction;
use App\Modules\Product\Actions\StoreProductAction;
use App\Modules\Product\Actions\UpdateProductAction;
use App\Modules\Product\DTO\ProductDTO;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Requests\StoreProductRequest;
use App\Modules\Product\Requests\UpdateProductRequest;
use App\Modules\Product\ViewModels\ProductIndexVM;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\Product\ViewModels\ProductShowVM;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $response = Helper::createSuccessResponse(ProductIndexVM::toArray());
        return response()->json($response, $response['code']);
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
        $response = Helper::createResponse(StoreProductAction::execute($ProductDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $Product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($Product)
    {
        //
        $Product = Product::find($Product);
        $response = Helper::createSuccessResponse(ProductShowVM::toArray($Product));
        return response()->json($response, $response['code']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $updateProductRequest
     * @param Product $Product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductRequest $updateProductRequest, $Product)
    {
        //
        $Product = Product::find($Product);
        $ProductDTO = ProductDTO::fromRequestForUpdate($updateProductRequest, $Product);
        $response = Helper::createResponse(UpdateProductAction::execute($Product, $ProductDTO));
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
        $response = Helper::createResponse(DeleteProductAction::execute($Product));
        return response()->json($response, $response['code']);
    }
}
