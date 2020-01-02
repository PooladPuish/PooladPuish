<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\Models;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;
use function App\Providers\MsgSuccess;

class ModelController extends Controller
{
    /**
     * نمایش لیست قالب سازها *
     */
    public function list()
    {
        $models = Models::orderBy('id', 'desc')->get();
        return view('models.list', compact('models'));

    }

    /**
     * ثبت مشخصات قالب سازها *
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'code' => 'required|integer|unique:commodities',
        ], [
            'code.unique' => 'سازنده قالب با این کد در سیستم موجود است.',
            'code.required' => 'پرکردن کد سازنده قالب الزامی میباشد',
            'code.integer' => 'کد سازنده قالب بایستی از نوع عدد باشد',
            'name.required' => 'پرکردن نام سازنده قالب الزامی میباشد',
        ]);

        $success = Models::create([
            'code' => $request['code'],
            'name' => $request['name'],
        ]);
        return MsgSuccess('مشخصات سازنده قالب جدید با موفقیت در سیستم ثبت شد');
    }

    /**
     * حذف مشخصات قالب سازها *
     */
    public function delete(Models $id)
    {
        $id->delete();
        return MsgSuccess('مشخصات سازنده قالب با موفقیت از سیستم حذف شد');

    }

    /**
     * ویرایش مشخصات قالب سازها *
     */
    public function edit(Request $request)
    {
        $models = Models::where('id', $request['id'])->pluck('code')->all();
        foreach ($models as $model)
            if ($request['code'] == $model) {

                $this->validate($request, [
                    'name' => 'required',
                    'code' => 'required|integer',
                ], [
                    'code.required' => 'پرکردن کد سازنده قالب الزامی میباشد',
                    'code.integer' => 'کد سازنده قالب بایستی از نوع عدد باشد',
                    'name.required' => 'پرکردن نام سازنده قالب الزامی میباشد',
                ]);
            } else
                $this->validate($request, [
                    'name' => 'required',
                    'code' => 'required|integer|unique:commodities',
                ], [
                    'code.unique' => 'سازنده قالب با این کد در سیستم موجود است.',
                    'code.required' => 'پرکردن کد سازنده قالب الزامی میباشد',
                    'code.integer' => 'کد سازنده قالب بایستی از نوع عدد باشد',
                    'name.required' => 'پرکردن نام سازنده قالب الزامی میباشد',
                ]);

        $id = $request['id'];
        Models::find($id)->update([
            'name' => $request['name'],
            'code' => $request['code'],
        ]);
        return MsgSuccess('مشخصات سازنده قالب با موفقیت ویرایش شد');

    }


}
