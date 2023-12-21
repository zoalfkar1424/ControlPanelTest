<?php


namespace App\Modules\Product\DataTables;

use App\Modules\Product\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductDataTable
{
    public static function toJson(Request $request)
    {
        $query = Product::with('ProductTechnicalCharacteristic')->select('*')->orderBy("id", 'desc');
        $response = Datatables::of($query)
            ->filter(function ($query) {
                if (isset(request('filter')['name'])) {
                    $query->where('name', 'like', "%" . request('filter')['name'] . "%");
                }
            })
            ->toJson();
        return $response;
    }

}
