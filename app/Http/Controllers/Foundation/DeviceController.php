<?php

namespace App\Http\Controllers\Foundation;

use App\Http\Controllers\Controller;
use App\Device;
use Illuminate\Http\Request;
use Response;
use Validator;
use Yajra\DataTables\DataTables;
use function App\Providers\MsgSuccess;

class DeviceController extends Controller
{
    /**
     * نمایش لیست دستگاها *
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Device::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action'])
                ->make(true);

        }
        return view('device.list');
    }

    /**
     * ثبت مشخصات دستگاها *
     */
    public function store(Request $request)
    {
        if (!empty($request->product)) {
            $devices = Device::find($request->product);
            if ($devices->code != $request->code) {
                $validator = Validator::make($request->all(), [
                    'code' => 'required|integer|unique:devices',
                    'name' => 'required',
                    'model' => 'required',
                ], [
                    'code.unique' => 'دستگاه با این کد در سیستم موجود است.',
                    'code.required' => 'پرکردن کد دستگاه الزامی میباشد',
                    'code.integer' => 'کد دستگاه بایستی از نوع عدد باشد',
                    'name.required' => 'نام دستگاه را وارد کنید',
                    'model.required' => 'مدل دستگاه را وارد کنید',
                ]);
            } else
                $validator = Validator::make($request->all(), [
                    'code' => 'required|integer',
                    'name' => 'required',
                    'model' => 'required',
                ], [
                    'code.required' => 'پرکردن کد دستگاه الزامی میباشد',
                    'code.integer' => 'کد دستگاه بایستی از نوع عدد باشد',
                    'name.required' => 'نام دستگاه را وارد کنید',
                    'model.required' => 'مدل دستگاه را وارد کنید',
                ]);
        } else
            $validator = Validator::make($request->all(), [
                'code' => 'required|integer|unique:devices',
                'name' => 'required',
                'model' => 'required',
            ], [
                'code.unique' => 'دستگاه با این کد در سیستم موجود است.',
                'code.required' => 'پرکردن کد دستگاه الزامی میباشد',
                'code.integer' => 'کد دستگاه بایستی از نوع عدد باشد',
                'name.required' => 'نام دستگاه را وارد کنید',
                'model.required' => 'مدل دستگاه را وارد کنید',
            ]);
        if ($validator->passes()) {
            Device::updateOrCreate(['id' => $request->product],
                [
                    'name' => $request->name,
                    'code' => $request->code,
                    'model' => $request->model,
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
        $post = Device::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }

    /**
     * ویرایش مشخصات گروه کالایی *
     */
    public function update($id)
    {
        $product = Device::find($id);
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
