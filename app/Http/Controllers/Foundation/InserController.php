<?php

namespace App\Http\Controllers\Foundation;

use App\Http\Controllers\Controller;
use App\Insert;
use Illuminate\Http\Request;
use Response;
use Validator;
use Yajra\DataTables\DataTables;

class InserController extends Controller
{
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Insert::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('insert.list');

    }


    public function store(Request $request)
    {
        if (!empty($request->product)) {
            $inserts = Insert::find($request->product)->first();
            if ($request->code != $inserts->code) {
                $validator = Validator::make($request->all(), [
                    'code' => 'required|integer|unique:inserts',
                    'name' => 'required',
                    'manufacturer' => 'required',
                ], [
                    'code.required' => 'لطفا کد را وارد کنید',
                    'code.integer' => 'کد باید از نوع عدد باشد',
                    'code.unique' => 'insert با این کد در سیستم موجود است',
                    'name.required' => 'لطفا نام insert را وارد کنید',
                    'manufacturer.required' => 'لطفا نام سازنده را وارد کنید',
                ]);
            } else
                $validator = Validator::make($request->all(), [
                    'code' => 'required|integer',
                    'name' => 'required',
                    'manufacturer' => 'required',
                ], [
                    'code.required' => 'لطفا کد را وارد کنید',
                    'code.integer' => 'کد باید از نوع عدد باشد',
                    'name.required' => 'لطفا نام insert را وارد کنید',
                    'manufacturer.required' => 'لطفا نام سازنده را وارد کنید',
                ]);
        } else

            $validator = Validator::make($request->all(), [
                'code' => 'required|integer|unique:inserts',
                'name' => 'required',
                'manufacturer' => 'required',
            ], [
                'code.required' => 'لطفا کد را وارد کنید',
                'code.integer' => 'کد باید از نوع عدد باشد',
                'code.unique' => 'insert با این کد در سیستم موجود است',
                'name.required' => 'لطفا نام insert را وارد کنید',
                'manufacturer.required' => 'لطفا نام سازنده را وارد کنید',
            ]);

        if ($validator->passes()) {
            Insert::updateOrCreate(['id' => $request->product],
                [
                    'code' => $request->code,
                    'manufacturer' => $request->manufacturer,
                    'name' => $request->name,
                ]);
            return response()->json(['success' => 'Product saved successfully.']);
        }
        return Response::json(['errors' => $validator->errors()]);
    }

    public function update($id)
    {
        $product = Insert::find($id);
        return response()->json($product);
    }

    public function delete($id)
    {
        $post = Insert::findOrFail($id);
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
