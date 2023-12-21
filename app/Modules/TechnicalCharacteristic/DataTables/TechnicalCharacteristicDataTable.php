<?php


namespace App\Modules\TechnicalCharacteristic\DataTables;

use App\Modules\TechnicalCharacteristic\Models\TechnicalCharacteristic;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TechnicalCharacteristicDataTable
{
    public static function toJson(Request $request)
    {
        $query = TechnicalCharacteristic::select('*')->orderBy("id", 'desc');
        $response = Datatables::of($query)
            ->filter(function ($query) {
                if (isset(request('filter')['key'])) {
                    $query->where('name', 'like', "%" . request('filter')['name'] . "%");
                }
            })
            ->toJson();
        return $response;
    }

}
