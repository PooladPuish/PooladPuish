<?php

namespace App\Http\Controllers\Foundation;

use App\Http\Controllers\Controller;
use App\Commodity;
use App\Format;
use App\Models;
use App\Product;
use App\ProductCharacteristic;
use Illuminate\Http\Request;
use Response;
use Validator;
use Yajra\DataTables\DataTables;
use function App\Providers\MsgSuccess;

class FormatController extends Controller
{
    /**
     * نمایش لیست قالب ها *
     */
    public function list(Request $request)
    {
        $models = Models::all();
        $commoditys = Commodity::all();
        $characteristics = ProductCharacteristic::all();
        $products = Product::all();
        if ($request->ajax()) {
            $data = Format::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('models', function ($row) {
                    return $row->model->name;
                })
                ->addColumn('commoditys', function ($row) {
                    return $row->commodity->name;
                })
                ->addColumn('characteristics', function ($row) {
                    $characteristics = ProductCharacteristic::find($row->characteristics_id);
                    return $characteristics->name;
                })
                ->addColumn('products', function ($row) {
                    return $row->product->name;
                })
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action', 'models', 'commoditys', 'characteristics', 'products'])
                ->make(true);

        }
        return view('formats.list', compact('models'
            , 'commoditys'
            , 'characteristics', 'products'));

    }

    /**
     * ثبت مشخصات قالب ها *
     */
    public function store(Request $request)
    {
        if (!empty($request->product)) {
            $formats = Format::find($request->product);
            if ($formats->code != $request->code) {
                $validator = Validator::make($request->all(), [
                    'code' => 'required|integer|unique:formats',
                    'model_id' => 'required',
                    'product_id' => 'required',
                    'commodity_id' => 'required',
                    'characteristics_id' => 'required',
                    'size' => 'required',
                    'quetta' => 'required',
                ], [
                    'code.unique' => 'قالب با این کد در سیستم موجود است.',
                    'code.required' => 'پرکردن کد قالب الزامی میباشد',
                    'code.integer' => 'کد قالب بایستی از نوع عدد باشد',
                    'model_id.required' => 'وارد کردن قالب ساز الزامی میباشد',
                    'product_id.required' => 'وارد کردن محصول الزامی میباشد',
                    'commodity_id.required' => 'وارد کردن گروه کالایی الزامی میباشد',
                    'characteristics_id.required' => 'وارد کردن مشخصه قالب الزامی میباشد',
                    'size.required' => 'وارد کردن وزن محصول الزامی میباشد',
                    'quetta.required' => 'وارد کردن تعداد کویته الزامی میباشد',
                ]);
            } else
                $validator = Validator::make($request->all(), [
                    'code' => 'required|integer',
                    'model_id' => 'required',
                    'product_id' => 'required',
                    'commodity_id' => 'required',
                    'characteristics_id' => 'required',
                    'size' => 'required',
                    'quetta' => 'required',
                ], [
                    'code.required' => 'پرکردن کد قالب الزامی میباشد',
                    'code.integer' => 'کد قالب بایستی از نوع عدد باشد',
                    'model_id.required' => 'وارد کردن قالب ساز الزامی میباشد',
                    'product_id.required' => 'وارد کردن محصول الزامی میباشد',
                    'commodity_id.required' => 'وارد کردن گروه کالایی الزامی میباشد',
                    'characteristics_id.required' => 'وارد کردن مشخصه قالب الزامی میباشد',
                    'size.required' => 'وارد کردن وزن محصول الزامی میباشد',
                    'quetta.required' => 'وارد کردن تعداد کویته الزامی میباشد',
                ]);
        } else
            $validator = Validator::make($request->all(), [
                'code' => 'required|integer|unique:formats',
                'model_id' => 'required',
                'product_id' => 'required',
                'commodity_id' => 'required',
                'characteristics_id' => 'required',
                'size' => 'required',
                'quetta' => 'required',
            ], [
                'code.unique' => 'قالب با این کد در سیستم موجود است.',
                'code.required' => 'پرکردن کد قالب الزامی میباشد',
                'code.integer' => 'کد قالب بایستی از نوع عدد باشد',
                'model_id.required' => 'وارد کردن قالب ساز الزامی میباشد',
                'product_id.required' => 'وارد کردن محصول الزامی میباشد',
                'commodity_id.required' => 'وارد کردن گروه کالایی الزامی میباشد',
                'characteristics_id.required' => 'وارد کردن مشخصه قالب الزامی میباشد',
                'size.required' => 'وارد کردن وزن محصول الزامی میباشد',
                'quetta.required' => 'وارد کردن تعداد کویته الزامی میباشد',
            ]);
        if ($validator->passes()) {
            Format::updateOrCreate(['id' => $request->product],
                [
                    'model_id' => $request->model_id,
                    'commodity_id' => $request->commodity_id,
                    'characteristics_id' => $request->characteristics_id,
                    'product_id' => $request->product_id,
                    'size' => $request->size,
                    'quetta' => $request->quetta,
                    'code' => $request->code
                ]);
            return response()->json(['success' => 'Product saved successfully.']);
        }
        return Response::json(['errors' => $validator->errors()]);
    }

    /**
     * حذف مشخصات قالب ها *
     */
    public function delete($id)
    {
        $post = Format::findOrFail($id);
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
     * ویرایش مشخصات قالب ها *
     */
    public function update($id)
    {
        $product = Format::find($id);
        return response()->json($product);
    }
}
