<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\Format;
use App\Models;
use App\Product;
use App\ProductCharacteristic;
use Illuminate\Http\Request;
use function App\Providers\MsgSuccess;

class FormatController extends Controller
{
    /**
     * نمایش لیست قالب ها *
     */
    public function list()
    {
        $models = Models::all();
        $commoditys = Commodity::all();
        $characteristics = ProductCharacteristic::all();
        $products = Product::all();
        $formats = Format::orderBy('id', 'desc')->get();
        return view('formats.list', compact('models', 'formats', 'commoditys'
            , 'characteristics', 'products'));

    }

    /**
     * ثبت مشخصات قالب ها *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|integer|unique:formats',
            'model_id' => 'required',
            'product_id' => 'required',
            'commodity_id' => 'required',
            'characteristics_id' => 'required',
            'size' => 'required',
            'quetta' => 'required',
        ], [
            'code.unique' => 'قالب با این کد در سیستم موجود است.',
            'code.required' => 'پرکردن کد قالب الزامی میباشد',
            'code.integer' => 'کد قالب بایستی از نوع عدد باشد',
            'model_id.required' => 'وارد کردن قالب ساز الزامی میباشد',
            'product_id.required' => 'وارد کردن محصول الزامی میباشد',
            'commodity_id.required' => 'وارد کردن گروه کالایی الزامی میباشد',
            'characteristics_id.required' => 'وارد کردن مشخصه قالب الزامی میباشد',
            'size.required' => 'وارد کردن وزن محصول الزامی میباشد',
            'quetta.required' => 'وارد کردن تعداد کویته الزامی میباشد',

        ]);


        Format::create($request->all());
        return MsgSuccess('مشخصات قالب با موفقیت در سیستم ثبت شد');

    }

    /**
     * حذف مشخصات قالب ها *
     */
    public function delete(Format $id)
    {
        $id->delete();
        return MsgSuccess('مشخصات قالب با موفقیت از سیستم حذف شد');

    }

    /**
     * ویرایش مشخصات قالب ها *
     */
    public function edit(Request $request)
    {

        $devices = Device::where('id', $request['id'])->pluck('code')->all();
        foreach ($devices as $device)
            if ($request['code'] == $device) {

                $this->validate($request, [
                    'code' => 'required|integer',
                    'model_id' => 'required',
                    'product_id' => 'required',
                    'commodity_id' => 'required',
                    'characteristics_id' => 'required',
                    'size' => 'required',
                    'quetta' => 'required',
                ], [
                    'code.required' => 'پرکردن کد قالب الزامی میباشد',
                    'code.integer' => 'کد قالب بایستی از نوع عدد باشد',
                    'model_id.required' => 'وارد کردن قالب ساز الزامی میباشد',
                    'product_id.required' => 'وارد کردن محصول الزامی میباشد',
                    'commodity_id.required' => 'وارد کردن گروه کالایی الزامی میباشد',
                    'characteristics_id.required' => 'وارد کردن مشخصه قالب الزامی میباشد',
                    'size.required' => 'وارد کردن وزن محصول الزامی میباشد',
                    'quetta.required' => 'وارد کردن تعداد کویته الزامی میباشد',

                ]);

            } else
                $this->validate($request, [
                    'code' => 'required|integer|unique:formats',
                    'model_id' => 'required',
                    'product_id' => 'required',
                    'commodity_id' => 'required',
                    'characteristics_id' => 'required',
                    'size' => 'required',
                    'quetta' => 'required',
                ], [
                    'code.unique' => 'قالب با این کد در سیستم موجود است.',
                    'code.required' => 'پرکردن کد قالب الزامی میباشد',
                    'code.integer' => 'کد قالب بایستی از نوع عدد باشد',
                    'model_id.required' => 'وارد کردن قالب ساز الزامی میباشد',
                    'product_id.required' => 'وارد کردن محصول الزامی میباشد',
                    'commodity_id.required' => 'وارد کردن گروه کالایی الزامی میباشد',
                    'characteristics_id.required' => 'وارد کردن مشخصه قالب الزامی میباشد',
                    'size.required' => 'وارد کردن وزن محصول الزامی میباشد',
                    'quetta.required' => 'وارد کردن تعداد کویته الزامی میباشد',

                ]);
        $id = $request['id'];
        Format::find($id)->update([
            'code' => $request->code,
            'model_id' => $request->model_id,
            'product_id' => $request->product_id,
            'commodity_id' => $request->commodity_id,
            'characteristics_id' => $request->characteristics_id,
            'size' => $request->size,
            'quetta' => $request->quetta,

        ]);
        return MsgSuccess('مشخصات قالب با موفقیت ویرایش شد');

    }
}
