<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\Product;
use App\ProductCharacteristic;
use Illuminate\Http\Request;
use function App\Providers\MsgSuccess;

class ProductController extends Controller
{
    /**
     * نمایش لیست محصولات *
     */
    public function list()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $ProductCharacteristics = ProductCharacteristic::all();
        $commoditys = Commodity::all();
        return view('product.list', compact('products', 'commoditys', 'ProductCharacteristics'));
    }

    /**
     * تعامل بین گروه کالایی و مشخصه محصول ایجکس *
     */
    public function getcharacteristic(Request $request)
    {
        $states = \DB::table("product_characteristics")
            ->where("commodity_id", $request->commodity_id)
            ->pluck("name", "id");
        return response()->json($states);
    }

    /**
     * ثبت مشخصات محصولات *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required|integer|unique:products',
        ], [
            'code.unique' => 'محصول با این کد در سیستم موجود است.',
            'code.required' => 'پرکردن کد محصول الزامی میباشد',
            'code.integer' => 'کد محصول بایستی از نوع عدد باشد',
            'name.required' => 'پرکردن نام محصول الزامی میباشد',
        ]);
        Product::create([
            'code' => $request['code'],
            'commodity_id' => $request['commodity_id'],
            'characteristics_id' => $request['characteristic'],
            'name' => $request['name'],
        ]);
        return MsgSuccess('مشخصات محصول با موفقیت در سیستم ثبت شد');

    }

    /**
     * ویرایش مشخصات محصولات *
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
                    'code.unique' => 'محصول با این کد در سیستم موجود است.',
                    'code.required' => 'پرکردن کد محصول الزامی میباشد',
                    'code.integer' => 'کد محصول بایستی از نوع عدد باشد',
                    'name.required' => 'پرکردن نام محصول الزامی میباشد',
                ]);

        $id = $request->id;
        Product::find($id)->update([
            'code' => $request['code'],
            'commodity_id' => $request['commodity_id'],
            'characteristics_id' => $request['characteristic'],
            'name' => $request['name'],
        ]);
        return MsgSuccess('مشخصات محصول با موفقیت در سیستم ویرایش شد');

    }

    /**
     * حذف مشخصات محصولات *
     */
    public function delete(Product $id)
    {
        $id->delete();
        return MsgSuccess('مشخصات محصول با موفقیت از سیستم حذف شد');

    }
}
