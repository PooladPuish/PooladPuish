<?php

namespace App\Http\Controllers\Foundation;
use App\Http\Controllers\Controller;
use App\Color;
use App\Seller;
use Illuminate\Http\Request;
use function App\Providers\MsgSuccess;

class SellerController extends Controller
{
    /**
     * نمایش لیست فروشنده ها*
     */
    public function list()
    {
        $colors = Color::all();
        $sellers = Seller::orderBy('id', 'desc')->get();
        return view('seller.list', compact('colors', 'sellers'));
    }

    /**
     * ثبت اطلاعات فروشنده *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|integer|unique:sellers',
            'color_id' => 'required',
            'company' => 'required',
            'connector' => 'required',
            'side' => 'required',
            'tel' => 'required',
            'inside' => 'required',
            'phone' => 'required',
        ], [
            'code.unique' => 'فروشنده با این کد در سیستم موجود است.',
            'code.required' => 'پرکردن کد فروشنده الزامی میباشد',
            'code.integer' => 'کد فروشنده بایستی از نوع عدد باشد',
            'color_id.required' => 'رنگ مستربچ را انتخاب کنید',
            'connector.required' => 'نام شخص رابط را وارد کنید',
            'grid.required' => 'نام گرید مواد پلیمیری را وارد کنید',
            'side.required' => 'سمت را وارد کنید',
            'tel.required' => 'شماره تلفن را وارد کنید',
            'inside.required' => 'شماره داخلی را وارد کنید',
            'phone.required' => 'شماره همراه را وارد کنید',
        ]);
        Seller::create($request->all());
        return MsgSuccess('مشخصات فروشنده با موفقیت در سیستم ثبت شد');
    }

    /**
     * ویرایش مشخصات فروشنده *
     */
    public function edit(Request $request)
    {
        $commoditys = Commodity::where('id', $request['id'])->pluck('code')->all();
        foreach ($commoditys as $commodity)
            if ($request['code'] == $commodity) {
                $this->validate($request, [
                    'code' => 'required|integer',
                    'color_id' => 'required',
                    'company' => 'required',
                    'connector' => 'required',
                    'side' => 'required',
                    'tel' => 'required',
                    'inside' => 'required',
                    'phone' => 'required',
                ], [
                    'code.required' => 'پرکردن کد فروشنده الزامی میباشد',
                    'code.integer' => 'کد فروشنده بایستی از نوع عدد باشد',
                    'color_id.required' => 'رنگ مستربچ را انتخاب کنید',
                    'connector.required' => 'نام شخص رابط را وارد کنید',
                    'grid.required' => 'نام گرید مواد پلیمیری را وارد کنید',
                    'side.required' => 'سمت را وارد کنید',
                    'tel.required' => 'شماره تلفن را وارد کنید',
                    'inside.required' => 'شماره داخلی را وارد کنید',
                    'phone.required' => 'شماره همراه را وارد کنید',

                ]);
            } else
                $this->validate($request, [
                    'code' => 'required|integer|unique:sellers',
                    'color_id' => 'required',
                    'company' => 'required',
                    'connector' => 'required',
                    'side' => 'required',
                    'tel' => 'required',
                    'inside' => 'required',
                    'phone' => 'required',
                ], [
                    'code.unique' => 'فروشنده با این کد در سیستم موجود است.',
                    'code.required' => 'پرکردن کد فروشنده الزامی میباشد',
                    'code.integer' => 'کد فروشنده بایستی از نوع عدد باشد',
                    'color_id.required' => 'رنگ مستربچ را انتخاب کنید',
                    'connector.required' => 'نام شخص رابط را وارد کنید',
                    'grid.required' => 'نام گرید مواد پلیمیری را وارد کنید',
                    'side.required' => 'سمت را وارد کنید',
                    'tel.required' => 'شماره تلفن را وارد کنید',
                    'inside.required' => 'شماره داخلی را وارد کنید',
                    'phone.required' => 'شماره همراه را وارد کنید',
                ]);
        $id = $request['id'];
        Seller::find($id)->update([
            'code' => $request->code,
            'color_id' => $request->color_id,
            'company' => $request->company,
            'connector' => $request->connector,
            'side' => $request->side,
            'tel' => $request->tel,
            'inside' => $request->inside,
            'phone' => $request->phone,
        ]);
        return MsgSuccess('مشخصات فروشنده با موفقیت ویرایش شد');
    }

    /**
     * حذف مشخصات فروشنده ها *
     */
    public function delete(Seller $id)
    {
        $id->delete();
        return MsgSuccess('مشخصات فروشنده با موفقیت حذف شد');
    }
}
