<?php

namespace App\Http\Controllers;

use App\Commodity;
use Illuminate\Http\Request;
use function App\Providers\MsgError;
use function App\Providers\MsgSuccess;

class CommodityController extends Controller
{
    public function list()
    {
        $commoditys = Commodity::all();
        return view('CommodityGroup.list', compact('commoditys'));

    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'code' => 'required|integer|unique:commodities',
        ], [
            'code.unique' => 'کالا با این کد در سیستم موجود است.',
            'code.required' => 'پرکردن کد محصول الزامی میباشد',
            'code.integer' => 'کد محصول بایستی از نوع عدد باشد',
            'name.required' => 'پرکردن نام محصول الزامی میباشد',
        ]);

        $success = Commodity::create([
            'code' => $request['code'],
            'name' => $request['name'],
        ]);
        return back();
    }

    public function delete(Commodity $id)
    {
        $id->delete();
        return MsgSuccess('مشخصات کالا با موفقیت از سیستم حذف شد');

    }

    public function edit(Request $request)
    {
        $commoditys = Commodity::where('id', $request['id'])->pluck('code')->all();
        foreach ($commoditys as $commodity)
            if ($request['code'] == $commodity) {

                $this->validate($request, [
                    'name' => 'required',
                    'code' => 'required|integer',
                ], [
                    'code.required' => 'پرکردن کد محصول الزامی میباشد',
                    'code.integer' => 'کد محصول بایستی از نوع عدد باشد',
                    'name.required' => 'پرکردن نام محصول الزامی میباشد',
                ]);
            } else
                $this->validate($request, [
                    'name' => 'required',
                    'code' => 'required|integer|unique:commodities',
                ], [
                    'code.unique' => 'کالا با این کد در سیستم موجود است.',
                    'code.required' => 'پرکردن کد محصول الزامی میباشد',
                    'code.integer' => 'کد محصول بایستی از نوع عدد باشد',
                    'name.required' => 'پرکردن نام محصول الزامی میباشد',
                ]);

        $id = $request['id'];
        Commodity::find($id)->update([
            'name' => $request['name'],
            'code' => $request['code'],
        ]);
        return back();

    }
}
