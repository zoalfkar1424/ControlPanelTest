<?php


namespace App\Modules\ProductTechnicalCharacteristic\DataTables;

use App\Modules\ProductTechnicalCharacteristic\Models\ProductTechnicalCharacteristic;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductTechnicalCharacteristicDataTable
{
    public static function toJson(Request $request)
    {
        $query = ProductTechnicalCharacteristic::select('*')->orderBy("id", 'desc');
        $response = Datatables::of($query)
            ->filter(function ($query) {
                if (isset(request('filter')['key'])) {
                    $query->where('key', 'like', "%" . request('filter')['key'] . "%");
                }
            })
            ->toJson();
        return $response;
    }

}
