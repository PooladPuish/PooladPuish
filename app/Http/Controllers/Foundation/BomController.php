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
            $data = Bom::distinct()->select('product_id')->groupBy('product_id')->get();
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
            Bom::updateOrCreate(['id' => $request->pr],
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
            $data = Bom::where('product_id', $id)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('bom', function ($row) {
                    $boms = Product::where('id', $row->bom_id)->first();
                    return $boms->label;
                })
                ->addColumn('action', function ($row) {
                    return $this->action($row);
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

    public function deletep($id)
    {

        $boms = Bom::where('product_id', $id)->get();
        foreach ($boms as $bom)
            $post = Bom::find($bom->id)->delete();
        return response()->json($post);
    }

    public function actions($row)
    {
        $delete = url('/public/icon/icons8-delete-bin-96.png');


        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->product_id . '" data-original-title="حذف"
                       class="deletep">
                       <img src="' . $delete . '" width="25" title="حذف"></a>';
        return $btn;

    }

    public function action($row)
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

    public function filter(Request $request)
    {
        $bom_id = \DB::table("products")
            ->where("id", '!=', $request->product)
            ->pluck("label", "id");
        return response()->json($bom_id);
    }

    public function bom(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'required|integer',
        ], [
            'number.required' => 'لطفا تعداد را وارد کنید',
            'number.integer' => 'تعداد باید از نوع عدد باشد',
        ]);

        $products = Bom::where('product_id', $request->id_product)->get();
        foreach ($products as $product)
            if ($product->bom_id == $request->bom_id) {
                return response()->json(['unm' => 'این زیر مجمعه برای محصول انتخاب شده است']);
            }


        if ($validator->passes()) {
            Bom::Create(
                [
                    'product_id' => $request->id_product,
                    'bom_id' => $request->bom_id,
                    'number' => $request->number,
                ]);
            return response()->json(['success' => 'Product saved successfully.']);
        }
        return Response::json(['errors' => $validator->errors()]);
    }

}