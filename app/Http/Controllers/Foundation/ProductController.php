<?php

namespace App\Http\Controllers\Foundation;

use App\Http\Controllers\Controller;
use App\Commodity;
use App\Product;
use App\ProductCharacteristic;
use Illuminate\Http\Request;
use Response;
use Validator;
use Yajra\DataTables\DataTables;
use function App\Providers\MsgSuccess;

class ProductController extends Controller
{
    /**
     * نمایش لیست محصولات *
     */
    public function list(Request $request)
    {
        $ProductCharacteristics = ProductCharacteristic::all();
        $commoditys = Commodity::all();
        if ($request->ajax()) {
            $data = Product::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->addColumn('commodity_id', function ($row) {
                    return $row->commodity->name;
                })
                ->addColumn('characteristics_id', function ($row) {
                    $characteristics_id = ProductCharacteristic::find($row->characteristics_id);
                    return $characteristics_id->name;
                })
                ->rawColumns(['action', 'commodity_id', 'characteristics_id'])
                ->make(true);
        }
        return view('product.list', compact('commoditys', 'ProductCharacteristics'));
    }

    /**
     * تعامل بین گروه کالایی و مشخصه محصول ایجکس *
     */
    public function getcharacteristic(Request $request)
    {
        $states = \DB::table("product_characteristics")
            ->where("commodity_id", $request->commodity_id)
            ->pluck("name", "id");
        return response()->json($states);
    }

    /**
     * ثبت مشخصات محصولات *
     */
    public function store(Request $request)
    {

        if (!empty($request->product_id)) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'code' => 'required|integer',
            ], [
                'code.required' => 'پرکردن کد محصول الزامی میباشد',
                'code.integer' => 'کد محصول بایستی از نوع عدد باشد',
                'name.required' => 'پرکردن نام محصول الزامی میباشد',
            ]);
        } else
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'code' => 'required|integer|unique:products',
            ], [
                'code.unique' => 'محصول با این کد در سیستم موجود است.',
                'code.required' => 'پرکردن کد محصول الزامی میباشد',
                'code.integer' => 'کد محصول بایستی از نوع عدد باشد',
                'name.required' => 'پرکردن نام محصول الزامی میباشد',
            ]);

        if ($validator->passes()) {
            Product::updateOrCreate(['id' => $request->product_id],
                [
                    'name' => $request->name,
                    'code' => $request->code,
                    'commodity_id' => $request->commodity_id,
                    'characteristics_id' => $request->characteristic,
                ]);
            return response()->json(['success' => 'Product saved successfully.']);
        }
        return Response::json(['errors' => $validator->errors()]);


    }

    /**
     * حذف مشخصات محصولات *
     */
    public function delete($id)
    {
        $post = Product::findOrFail($id);
        $post->delete();
        return response()->json($post);

    }

    /**
     * اکشن های دیتا تیبل *
     */
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

    /**
     * ویرایش مشخصات محصولات *
     */
    public function update($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
}
