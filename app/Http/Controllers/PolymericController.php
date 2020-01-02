<?php

namespace App\Http\Controllers;

use App\Polymeric;
use App\Product;
use Illuminate\Http\Request;
use function App\Providers\MsgSuccess;

class PolymericController extends Controller
{
    /**
     * نمایش لیست مواد پلیمیری *
     */
    public function list()
    {
        $products = Product::all();
        $polymerics = Polymeric::orderBy('id', 'desc')->get();
        return view('polymeric.list', compact('polymerics', 'products'));

    }

    /**
     * ثبت مشخصات مواد پلیمیری *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|integer|unique:polymerics',
            'type' => 'required',
            'grid' => 'required',
            'name' => 'required',
            'product_id' => 'required',
            'description' => 'required',
        ], [
            'code.unique' => 'مواد پلیمیری با این کد در سیستم موجود است.',
            'code.required' => 'پرکردن کد مواد پلیمیری الزامی میباشد',
            'code.integer' => 'کد مواد پلیمیری بایستی از نوع عدد باشد',
            'name.required' => 'نام مواد پلیمیری را وارد کنید',
            'type.required' => 'نوع مواد پلیمیری را وارد کنید',
            'grid.required' => 'نام گرید مواد پلیمیری را وارد کنید',
            'product_id.required' => 'نام محصول را وارد کنید',
            'description.required' => 'توضیحات را وارد کنید',

        ]);

        Polymeric::create($request->all());
        return MsgSuccess('مشخصات مواد با موفقیت در سیستم ثبت شد');

    }

    /**
     * ویرایش مشخصات مواد پلیمیری *
     */
    public function edit(Request $request)
    {

        $devices = Device::where('id', $request['id'])->pluck('code')->all();
        foreach ($devices as $device)
            if ($request['code'] == $device) {
                $this->validate($request, [
                    'code' => 'required|integer',
                    'type' => 'required',
                    'grid' => 'required',
                    'name' => 'required',
                    'product_id' => 'required',
                    'description' => 'required',
                ], [
                    'code.required' => 'پرکردن کد مواد پلیمیری الزامی میباشد',
                    'code.integer' => 'کد مواد پلیمیری بایستی از نوع عدد باشد',
                    'name.required' => 'نام مواد پلیمیری را وارد کنید',
                    'type.required' => 'نوع مواد پلیمیری را وارد کنید',
                    'grid.required' => 'نام گرید مواد پلیمیری را وارد کنید',
                    'product_id.required' => 'نام محصول را وارد کنید',
                    'description.required' => 'توضیحات را وارد کنید',

                ]);
            } else
                $this->validate($request, [
                    'code' => 'required|integer|unique:polymerics',
                    'type' => 'required',
                    'grid' => 'required',
                    'name' => 'required',
                    'product_id' => 'required',
                    'description' => 'required',
                ], [
                    'code.unique' => 'مواد پلیمیری با این کد در سیستم موجود است.',
                    'code.required' => 'پرکردن کد مواد پلیمیری الزامی میباشد',
                    'code.integer' => 'کد مواد پلیمیری بایستی از نوع عدد باشد',
                    'name.required' => 'نام مواد پلیمیری را وارد کنید',
                    'type.required' => 'نوع مواد پلیمیری را وارد کنید',
                    'grid.required' => 'نام گرید مواد پلیمیری را وارد کنید',
                    'product_id.required' => 'نام محصول را وارد کنید',
                    'description.required' => 'توضیحات را وارد کنید',

                ]);
        $id = $request['id'];
        Polymeric::find($id)->update([
            'code' => $request->code,
            'type' => $request->type,
            'grid' => $request->grid,
            'name' => $request->name,
            'product_id' => $request->product_id,
            'description' => $request->description,
        ]);
        return MsgSuccess('مشخصات مواد پلیمیری با موفقیت در سیستم ویرایش شد');

    }

    /**
     * حذف مشخصات مواد پلیمیری *
     */
    public function delete(Polymeric $id)
    {
        $id->delete();
        return MsgSuccess('مشخصات مواد پلیمیری با موفقیت از سیستم حذف شد');

    }
}
