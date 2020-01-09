<?php

namespace App\Http\Controllers\Foundation;

use App\Bom;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Response;
use Validator;
use Yajra\DataTables\DataTables;

class BomController extends Controller
{
    public function list(Request $request)
    {
        $products = Product::all();
        if ($request->ajax()) {
            $data = \DB::table('boms')
                ->distinct('product_id')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('product', function ($row) {
                    $products = Product::where('id', $row->product_id)->first();
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->product_id . '"
                       class="details">
                      ' . $products->label . '
                      </a>';
                    return $btn;
                })
                ->addColumn('bom', function ($row) {
                    $boms = Product::where('id', $row->bom_id)->first();
                    return $boms->label;
                })
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action', 'product'])
                ->make(true);
        }
        return view('bom.list', compact('products'));

    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'number' => 'required|integer',
        ], [
            'number.required' => 'لطفا تعداد را وارد کنید',
            'number.integer' => 'تعداد باید از نوع عدد باشد',
        ]);

        if ($validator->passes()) {
            Bom::updateOrCreate(['id' => $request->product],
                [
                    'product_id' => $request->product_id,
                    'bom_id' => $request->bom_id,
                    'number' => $request->number,
                ]);
            return response()->json(['success' => 'Product saved successfully.']);
        }
        return Response::json(['errors' => $validator->errors()]);
    }

    public function update($id)
    {
        $product = Bom::find($id);
        return response()->json($product);
    }

    public function detail(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Bom::where('product_id', $id)->distinct('data.product_id')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('bom', function ($row) {
                    $boms = Product::where('id', $row->bom_id)->first();
                    return $boms->label;
                })
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action', 'product'])
                ->make(true);
        }
        return response()->json($data);
    }

    public function delete($id)
    {
        $post = Bom::findOrFail($id);
        $post->delete();
        return response()->json($post);
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
