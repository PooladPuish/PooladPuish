<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TypeCustomer extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = \App\TypeCustomer::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('type', function ($row) {

                    if ($row->type == 1) {
                        return 'شرکتی';
                    } else
                        return 'شخصی';
                })
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('typeCustomer.list');


    }

    public function store(Request $request)
    {

        \App\TypeCustomer::updateOrCreate(['id' => $request->product],
            [
                'code' => $request->code,
                'name' => $request->name,
                'type' => $request->type,
            ]);
        return response()->json(['success' => 'Product saved successfully.']);
    }

    public function update($id)
    {
        $product = \App\TypeCustomer::find($id);
        return response()->json($product);
    }

    public function delete($id)
    {
        $post = \App\TypeCustomer::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }

    public function actions($row)
    {
        $success = url('/public/icon/icons8-edit-144.png');
        $delete = url('/public/icon/icons8-delete-bin-96.png');

        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="ویرایش"
                       class="editProduct">
                       <img src="' . $success . '" width="25" title="ویرایش"></a>';

        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="حذف"
                       class="deleteProduct">
                       <img src="' . $delete . '" width="25" title="حذف"></a>';
        return $btn;

    }


}
