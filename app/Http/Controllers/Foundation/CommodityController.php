<?php

namespace App\Http\Controllers\Foundation;

use App\Http\Controllers\Controller;
use App\Commodity;
use Illuminate\Http\Request;
use Response;
use Validator;
use Yajra\DataTables\DataTables;
use function App\Providers\MsgError;
use function App\Providers\MsgSuccess;

class CommodityController extends Controller
{
    /**
     * نمایش لیست گروهای کالایی *
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Commodity::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action'])
                ->make(true);

        }
        return view('CommodityGroup.list');
    }

    /**
     * ثبت مشخصات گروه های کالایی *
     */
    public function store(Request $request)
    {
        if (!empty($request->product_id)) {
            $commoditys = Commodity::find($request->product_id);
            if ($request->code != $commoditys->code) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'code' => 'required|integer|unique:commodities',
                ], [
                    'code.unique' => 'گروه کالایی با این کد در سیستم موجود است',
                    'code.required' => 'لطفا کد گروه کالایی را وارد کنید',
                    'code.integer' => 'کد گروه کالایی باید از نوع عددی باشد',
                    'name.required' => 'لطفا نام گروه کالایی را وارد کنید',
                ]);
            } else
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'code' => 'required|integer',
                ], [
                    'code.required' => 'لطفا کد گروه کالایی را وارد کنید',
                    'code.integer' => 'کد گروه کالایی باید از نوع عددی باشد',
                    'name.required' => 'لطفا نام گروه کالایی را وارد کنید',
                ]);
        } else
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'code' => 'required|integer|unique:commodities',
            ], [
                'code.unique' => 'گروه کالایی با این کد در سیستم موجود است',
                'code.required' => 'لطفا کد گروه کالایی را وارد کنید',
                'code.integer' => 'کد گروه کالایی باید از نوع عددی باشد',
                'name.required' => 'لطفا نام گروه کالایی را وارد کنید',
            ]);


        if ($validator->passes()) {
            Commodity::updateOrCreate(['id' => $request->product_id],
                ['name' => $request->name, 'code' => $request->code]);
            return response()->json(['success' => 'Product saved successfully.']);
        }
        return Response::json(['errors' => $validator->errors()]);
    }

    /**
     * حذف مشخصات گروه کالایی *
     */
    public function delete($id)
    {
        $post = Commodity::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }

    /**
     * ویرایش مشخصات گروه کالایی *
     */
    public function update($id)
    {
        $product = Commodity::find($id);
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
