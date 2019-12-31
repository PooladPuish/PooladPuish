<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\Product;
use App\ProductCharacteristic;
use Illuminate\Http\Request;
use function App\Providers\MsgSuccess;

class ProductCharacteristicController extends Controller
{
    public function list()
    {
        $commoditys = Commodity::all();
        $products = ProductCharacteristic::all();
        return view('ProductCharacteristic.list', compact('products', 'commoditys'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'commodity_id' => 'required',
            'code' => 'required|integer|unique:product_characteristics',
            'name' => 'required',
        ], [
            'code.unique' => 'مشخصه محصول با این کد در سیستم موجود است.',
            'code.required' => 'پرکردن کد مشخصه محصول الزامی میباشد',
            'code.integer' => 'کد مشخصه محصول بایستی از نوع عدد باشد',
            'name.required' => 'نام مشخصه را وارد کنید',
            'commodity_id.required' => 'گروه کالایی را انتخاب کنید',
        ]);

        ProductCharacteristic::create([
            'commodity_id' => $request['commodity_id'],
            'code' => $request['code'],
            'name' => $request['name'],
        ]);
        return back();

    }

    public function edit(Request $request)
    {

        $ProductCharacteristics = ProductCharacteristic::where('id', $request['commodity_id'])->pluck('code')->all();
        foreach ($ProductCharacteristics as $ProductCharacteristic)
            if ($request['code'] == $ProductCharacteristic) {

                $this->validate($request, [
                    'commodity_id' => 'required',
                    'code' => 'required|integer',
                    'name' => 'required',
                ], [
                    'code.required' => 'پرکردن کد مشخصه محصول الزامی میباشد',
                    'code.integer' => 'کد مشخصه محصول بایستی از نوع عدد باشد',
                    'name.required' => 'نام مشخصه را وارد کنید',
                    'commodity_id.required' => 'گروه کالایی را انتخاب کنید',
                ]);
            } else
                $this->validate($request, [
                    'commodity_id' => 'required',
                    'code' => 'required|integer|unique:product_characteristics',
                    'name' => 'required',
                ], [
                    'code.unique' => 'مشخصه محصول با این کد در سیستم موجود است.',
                    'code.required' => 'پرکردن کد مشخصه محصول الزامی میباشد',
                    'code.integer' => 'کد مشخصه محصول بایستی از نوع عدد باشد',
                    'name.required' => 'نام مشخصه را وارد کنید',
                    'commodity_id.required' => 'گروه کالایی را انتخاب کنید',
                ]);


        $id = $request['id'];
        ProductCharacteristic::find($id)->update([
            'commodity_id' => $request['commodity_id'],
            'code' => $request['code'],
            'name' => $request['name'],
        ]);
        return back();

    }

    public function delete(ProductCharacteristic $id)
    {
        $id->delete();
        return MsgSuccess('مشخصه کالا با موفقیت از سیستم حذف شد');

    }


}
