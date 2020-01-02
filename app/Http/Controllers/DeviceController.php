<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use function App\Providers\MsgSuccess;

class DeviceController extends Controller
{
    /**
     * نمایش لیست دستگاها *
     */
    public function list()
    {
        $devices = Device::orderBy('id', 'desc')->get();
        return view('device.list', compact('devices'));
    }

    /**
     * ثبت مشخصات دستگاها *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
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
        Device::create($request->all());
        return MsgSuccess('مشخصات دستگاه جدید با موفقیت در سیستم ثبت شد');
    }

    /**
     * ویرایش مشخصات دستگاها *
     */
    public function edit(Request $request)
    {

        $devices = Device::where('id', $request['id'])->pluck('code')->all();
        foreach ($devices as $device)
            if ($request['code'] == $device) {

                $this->validate($request, [
                    'code' => 'required|integer',
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
                $this->validate($request, [
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
        $id = $request['id'];
        Device::find($id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'model' => $request->model,
        ]);
        return MsgSuccess('مشخصات دستگاه با موفقیت ویرایش شد');
    }

    /**
     * حذف مشخصات دستگاها *
     */
    public function delete(Device $id)
    {
        $id->delete();
        return MsgSuccess('مشخصات دستگاه با موفقیت از سیستم حذف شد');

    }

}
