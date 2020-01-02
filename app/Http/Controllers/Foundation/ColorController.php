<?php

namespace App\Http\Controllers\Foundation;

use App\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function App\Providers\MsgSuccess;

class ColorController extends Controller
{
    /**
     * نمایش لیست رنگها *
     */
    public function list()
    {
        $colors = Color::orderBy('id', 'desc')->get();
        return view('colors.list', compact('colors'));

    }

    /**
     * ثبت مشخصات رنگها *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
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
        Color::create($request->all());
        return MsgSuccess('مشخصات رنگ جدید با موفقیت در سیستم ثبت شد');

    }

    /**
     * ویرایش مشخصات رنگها *
     */
    public function edit(Request $request)
    {

        $colors = Color::where('id', $request['id'])->pluck('code')->all();
        foreach ($colors as $color)
            if ($request['code'] == $color) {

                $this->validate($request, [
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
                $this->validate($request, [
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
        $id = $request['id'];
        Color::find($id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'manufacturer' => $request->manufacturer,
            'combination' => $request->combination,
            'masterbatch' => $request->masterbatch,
        ]);
        return MsgSuccess('مشخصات رنگ با موفقیت ویرایش شد');
    }

    /**
     * حذف مشخصات رنگها *
     */
    public function delete(Color $id)
    {
        $id->delete();
        return MsgSuccess('مشخصات رنگ با موفقیت از سیستم حذف شد');

    }


}
