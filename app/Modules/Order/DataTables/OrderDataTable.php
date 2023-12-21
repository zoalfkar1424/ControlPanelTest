<?php


namespace App\Modules\Order\DataTables;

use App\Modules\Order\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderDataTable
{
    public static function toJson(Request $request)
    {
        $query = Order::select('*')->orderBy("id", 'desc');
        $response = Datatables::of($query)
            ->filter(function ($query) {
                if (isset(request('filter')['product_id'])) {
                    $query->where('num', 'like', "%" . request('filter')['num'] . "%");
                }
            })
            ->toJson();
        return $response;
    }

}
