<?php


namespace App\Modules\Workarea\DataTables;

use App\Modules\Workarea\Models\Workarea;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WorkareaDataTable
{
    public static function toJson(Request $request)
    {
        $query = Workarea::select('*')->orderBy("id", 'desc');
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
