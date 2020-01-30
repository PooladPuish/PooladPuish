<?php

namespace App\Http\Controllers\Sell;

use App\Color;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\ModelProduct;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Invoice::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('sell.list');

    }

    public function wizard()
    {
        $users = User::all();
        $customers = Customer::all();
        $products = Product::all();
        $colors = Color::all();
        $modelProducts = ModelProduct::all();
        return view('sell.wizard', compact('users', 'customers', 'products', 'colors', 'modelProducts'));

    }

    public function store(Request $request)
    {
        return response()->json($request->all());

    }


    public function actions($row)
    {
        $success = url('/public/icon/icons8-edit-144.png');
        $delete = url('/public/icon/icons8-delete-bin-96.png');

        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="ویرایش"
                       class="editProduct">
                       <img src="' . $success . '" width="25" title="ویرایش"></a>';

        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="حذف"
                       class="deleteProduct">
                       <img src="' . $delete . '" width="25" title="حذف"></a>';
        return $btn;

    }
}
