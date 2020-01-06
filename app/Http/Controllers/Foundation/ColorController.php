<?php

namespace App\Http\Controllers\Foundation;

use App\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Validator;
use Yajra\DataTables\DataTables;
use function App\Providers\MsgSuccess;

class ColorController extends Controller
{
    /**
     * نمایش لیست رنگها *
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Color::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('colors.list');
    }

    /**
     * ثبت مشخصات رنگها *
     */
    public function store(Request $request)
    {
        if (!empty($request->product_id)) {
            $color = Color::find($request->product_id);
            if ($color->code != $request->code) {
                $validator = Validator::make($request->all(), [
                    'code' => 'required|integer|unique:colors',
                    'name' => 'required',
                    'manufacturer' => 'required',
                    'combination' => 'required',
                    'masterbatch' => 'required|integer',
                ], [
                    'code.unique' => 'رنگ با این کد در سیستم موجود است.',
                    'code.required' => 'پرکردن کد رنگ الزامی میباشد',
                    'code.integer' => 'کد دستگاه بایستی از نوع عدد باشد',
                    'name.required' => 'نام رنگ را وارد کنید',
                    'manufacturer.required' => 'نام سازنده رنگ را وارد کنید',
                    'combination.required' => 'درصد ترکیب مواد را وارد کنید',
                    'masterbatch.required' => 'کد مستربچ را وارد کنید',
                    'masterbatch.integer' => 'کد مستربچ باید از نوع عددی باشد',
                ]);
            } else
                $validator = Validator::make($request->all(), [
                    'code' => 'required|integer',
                    'name' => 'required',
                    'manufacturer' => 'required',
                    'combination' => 'required',
                    'masterbatch' => 'required|integer',
                ], [
                    'code.required' => 'پرکردن کد رنگ الزامی میباشد',
                    'code.integer' => 'کد دستگاه بایستی از نوع عدد باشد',
                    'name.required' => 'نام رنگ را وارد کنید',
                    'manufacturer.required' => 'نام سازنده رنگ را وارد کنید',
                    'combination.required' => 'درصد ترکیب مواد را وارد کنید',
                    'masterbatch.required' => 'کد مستربچ را وارد کنید',
                    'masterbatch.integer' => 'کد مستربچ باید از نوع عددی باشد',
                ]);
        } else
            $validator = Validator::make($request->all(), [
                'code' => 'required|integer|unique:colors',
                'name' => 'required',
                'manufacturer' => 'required',
                'combination' => 'required',
                'masterbatch' => 'required|integer',
            ], [
                'code.unique' => 'رنگ با این کد در سیستم موجود است.',
                'code.required' => 'پرکردن کد رنگ الزامی میباشد',
                'code.integer' => 'کد دستگاه بایستی از نوع عدد باشد',
                'name.required' => 'نام رنگ را وارد کنید',
                'manufacturer.required' => 'نام سازنده رنگ را وارد کنید',
                'combination.required' => 'درصد ترکیب مواد را وارد کنید',
                'masterbatch.required' => 'کد مستربچ را وارد کنید',
                'masterbatch.integer' => 'کد مستربچ باید از نوع عددی باشد',
            ]);
        if ($validator->passes()) {
            Color::updateOrCreate(['id' => $request->product_id],
                [
                    'name' => $request->name,
                    'code' => $request->code,
                    'manufacturer' => $request->manufacturer,
                    'combination' => $request->combination,
                    'masterbatch' => $request->masterbatch,
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
        $post = Color::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }

    /**
     * ویرایش مشخصات گروه کالایی *
     */
    public function update($id)
    {
        $product = Color::find($id);
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
