<?php

namespace App\Http\Controllers\Barn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarnProductController extends Controller
{
    public function list(Request $request)
    {

        return view('barnproduct.list');


    }

    public function update($id)
    {
        $color = BarnColor::where('color_id', $id)
            ->first();
        return response()->json($color);
    }

    public function store(Request $request)
    {
        BarnColor::updateOrCreate(['color_id' => $request->id],
            [
                'color_id' => $request->id,
                'PhysicalInventory' => $request->PhysicalInventory,
            ]);
        return response()->json(['success' => 'Product saved successfully.']);


    }

    public function actions($row)
    {


        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="ویرایش"
                       class="editProduct">
                  <i class="fa fa-edit fa-lg" title="افزایش موجودی"></i>
                       </a>';

        return $btn;

    }
}
