<?php

namespace App\Http\Controllers\Foundation;

use App\Http\Controllers\Controller;
use App\Color;
use App\Seller;
use Illuminate\Http\Request;
use Response;
use Validator;
use Yajra\DataTables\DataTables;
use function App\Providers\MsgSuccess;

class SellerController extends Controller
{
    /**
     * نمایش لیست فروشنده ها*
     */
    public function list(Request $request)
    {
        $colors = Color::all();
        if ($request->ajax()) {
            $data = Seller::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('color', function ($row) {
                    return $row->color->name;
                })
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action', 'color'])
                ->make(true);

        }
        return view('seller.list', compact('colors'));
    }

    /**
     * ثبت اطلاعات فروشنده *
     */
    public function store(Request $request)
    {
        if (!empty($request->product_id)) {
            $validator = Validator::make($request->all(), [
                'code' => 'required|integer',
                'color_id' => 'required',
                'company' => 'required',
                'connector' => 'required',
                'side' => 'required',
                'tel' => 'required',
                'inside' => 'required',
                'phone' => 'required',
            ], [
                'code.required' => 'پرکردن کد فروشنده الزامی میباشد',
                'code.integer' => 'کد فروشنده بایستی از نوع عدد باشد',
                'color_id.required' => 'رنگ مستربچ را انتخاب کنید',
                'connector.required' => 'نام شخص رابط را وارد کنید',
                'grid.required' => 'نام گرید مواد پلیمیری را وارد کنید',
                'side.required' => 'سمت را وارد کنید',
                'tel.required' => 'شماره تلفن را وارد کنید',
                'inside.required' => 'شماره داخلی را وارد کنید',
                'phone.required' => 'شماره همراه را وارد کنید',
            ]);
        } else
            $validator = Validator::make($request->all(), [
                'code' => 'required|integer|unique:sellers',
                'color_id' => 'required',
                'company' => 'required',
                'connector' => 'required',
                'side' => 'required',
                'tel' => 'required',
                'inside' => 'required',
                'phone' => 'required',
            ], [
                'code.unique' => 'فروشنده با این کد در سیستم موجود است.',
                'code.required' => 'پرکردن کد فروشنده الزامی میباشد',
                'code.integer' => 'کد فروشنده بایستی از نوع عدد باشد',
                'color_id.required' => 'رنگ مستربچ را انتخاب کنید',
                'connector.required' => 'نام شخص رابط را وارد کنید',
                'grid.required' => 'نام گرید مواد پلیمیری را وارد کنید',
                'side.required' => 'سمت را وارد کنید',
                'tel.required' => 'شماره تلفن را وارد کنید',
                'inside.required' => 'شماره داخلی را وارد کنید',
                'phone.required' => 'شماره همراه را وارد کنید',
            ]);
        if ($validator->passes()) {
            Seller::updateOrCreate(['id' => $request->product_id],
                [
                    'code' => $request->code,
                    'color_id' => $request->color_id,
                    'company' => $request->company,
                    'connector' => $request->connector,
                    'side' => $request->side,
                    'tel' => $request->tel,
                    'inside' => $request->inside,
                    'phone' => $request->phone,
                ]);
            return response()->json(['success' => 'Product saved successfully.']);
        }
        return Response::json(['errors' => $validator->errors()]);
    }

    /**
     * حذف مشخصات گروه کالایی *
     */
    public function delete($id)
    {
        $post = Seller::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }

    /**
     * ویرایش مشخصات گروه کالایی *
     */
    public function update($id)
    {
        $product = Seller::find($id);
        return response()->json($product);
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
}
