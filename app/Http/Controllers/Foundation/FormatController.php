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
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action', 'models'])
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
                    'quetta' => 'required',
                    'name' => 'required',
                ], [
                    'code.unique' => 'قالب با این کد در سیستم موجود است.',
                    'code.required' => 'پرکردن کد قالب الزامی میباشد',
                    'code.integer' => 'کد قالب بایستی از نوع عدد باشد',
                    'model_id.required' => 'وارد کردن قالب ساز الزامی میباشد',
                    'quetta.required' => 'وارد کردن تعداد کویته الزامی میباشد',
                    'name.required' => 'وارد کردن نام الزامی میباشد',
                ]);
            } else
                $validator = Validator::make($request->all(), [
                    'code' => 'required|integer',
                    'model_id' => 'required',
                    'quetta' => 'required',
                    'name' => 'required',

                ], [
                    'code.required' => 'پرکردن کد قالب الزامی میباشد',
                    'code.integer' => 'کد قالب بایستی از نوع عدد باشد',
                    'model_id.required' => 'وارد کردن قالب ساز الزامی میباشد',
                    'quetta.required' => 'وارد کردن تعداد کویته الزامی میباشد',
                    'name.required' => 'وارد کردن نام الزامی میباشد',

                ]);
        } else
            $validator = Validator::make($request->all(), [
                'code' => 'required|integer|unique:formats',
                'model_id' => 'required',
                'quetta' => 'required',
                'name.required' => 'وارد کردن نام الزامی میباشد',

            ], [
                'code.unique' => 'قالب با این کد در سیستم موجود است.',
                'code.required' => 'پرکردن کد قالب الزامی میباشد',
                'code.integer' => 'کد قالب بایستی از نوع عدد باشد',
                'model_id.required' => 'وارد کردن قالب ساز الزامی میباشد',
                'quetta.required' => 'وارد کردن تعداد کویته الزامی میباشد',
                'name.required' => 'وارد کردن نام الزامی میباشد',

            ]);
        if ($validator->passes()) {
            Format::updateOrCreate(['id' => $request->product],
                [
                    'model_id' => $request->model_id,
                    'quetta' => $request->quetta,
                    'code' => $request->code,
                    'name' => $request->name,
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
                        <i class="fa fa-edit fa-lg" title="ویرایش"></i>
                       </a>&nbsp;&nbsp;';

        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="حذف"
                       class="deleteProduct">
                       <i class="fa fa-trash fa-lg" title="حذف"></i>
                       </a>';

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
