<?php

namespace App\Http\Controllers\Barn;

use App\BarnsProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BarnProductController extends Controller
{
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = BarnsProduct::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('product_id', function ($row) {
                    return $row->product->label;
                })
                ->addColumn('color_id', function ($row) {
                    return $row->color->manufacturer . ' - ' . $row->color->name;
                })
                ->rawColumns([])
                ->make(true);

        }
        return view('barnproduct.list');


    }


}
