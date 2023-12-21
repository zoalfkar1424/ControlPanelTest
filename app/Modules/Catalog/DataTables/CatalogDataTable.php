<?php


namespace App\Modules\Catalog\DataTables;

use App\Modules\Catalog\Models\Catalog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CatalogDataTable
{
    public static function toJson(Request $request)
    {
        $query = Catalog::select('*')->orderBy("id", 'desc');
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
