<?php


namespace App\Modules\LogType\DataTables;

use App\Modules\LogType\Models\LogType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LogTypeDataTable
{
    public static function toJson(Request $request)
    {
        $query = LogType::select('*')->orderBy("id", 'desc');
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
