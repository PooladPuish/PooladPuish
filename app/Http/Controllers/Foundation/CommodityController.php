<?php

namespace App\Http\Controllers\Foundation;
use App\Http\Controllers\Controller;
use App\Commodity;
use Illuminate\Http\Request;
use function App\Providers\MsgError;
use function App\Providers\MsgSuccess;

class CommodityController extends Controller
{
    /**
     * نمایش لیست گروهای کالایی *
     */
    public function list()
    {
        $commoditys = Commodity::orderBy('id', 'desc')->get();
        return view('CommodityGroup.list', compact('commoditys'));
    }

    /**
     * ثبت مشخصات گروه های کالایی *
     */
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
        return MsgSuccess('مشخصات گروه کالای جدید با موفقیت در سیستم ثبت شد');
    }

    /**
     * حذف مشخصات گروه کالایی *
     */
    public function delete(Commodity $id)
    {
        $id->delete();
        return MsgSuccess('مشخصات کالا با موفقیت از سیستم حذف شد');

    }

    /**
     * ویرایش مشخصات گروه کالایی *
     */
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
        return MsgSuccess('مشخصات گروه کالا با موفقیت ویرایش شد');

    }

}
