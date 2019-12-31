<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\Product;
use App\ProductCharacteristic;
use Illuminate\Http\Request;
use function App\Providers\MsgSuccess;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::all();
        $ProductCharacteristics = ProductCharacteristic::all();
        $commoditys = Commodity::all();
        return view('product.list', compact('products', 'commoditys', 'ProductCharacteristics'));

    }

    public function getcharacteristic(Request $request)
    {

        $states = \DB::table("product_characteristics")
            ->where("commodity_id", $request->commodity_id)
            ->pluck("name", "id");
        return response()->json($states);
    }

    public function store(Request $request)
    {
        Product::create([
            'code' => $request['code'],
            'commodity_id' => $request['commodity_id'],
            'characteristics_id' => $request['characteristic'],
            'name' => $request['name'],
        ]);
        return back();

    }

    public function edit(Request $request)
    {
        $id = $request->id;
        Product::find($id)->update([
            'code' => $request['code'],
            'commodity_id' => $request['commodity_id'],
            'characteristics_id' => $request['characteristic'],
            'name' => $request['name'],
        ]);
        return back();

    }

    public function delete(Product $id)
    {
        $id->delete();
        return MsgSuccess('مشخصات محصول با موفقیت از سیستم حذف شد');

    }
}
