<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SelectStore;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SelectStoreController extends Controller
{
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = SelectStore::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return 'فعال';
                    } else
                        return 'غیر فعال';

                })
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('selectStore.list');

    }

    public function store(Request $request)
    {
        SelectStore::updateOrCreate(['id' => $request->id],
            [
                'name' => $request->name,
                'tel' => $request->tel,
                'address' => $request->address,
                'status' => $request->status,
            ]);
        return response()->json(['success' => 'Product saved successfully.']);

    }


    public function update($id)
    {
        $bank = SelectStore::find($id);
        return response()->json($bank);

    }

    public function delete($id)
    {
        $delete = SelectStore::find($id);
        $delete->delete();
        return response()->json(['success' => 'Product saved successfully.']);

    }

    public function actions($row)
    {
        $success = url('/public/icon/icons8-edit-144.png');
        $delete = url('/public/icon/icons8-delete-bin-96.png');


        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="ویرایش"
                       class="editProduct">
                       <img src="' . $success . '" width="25" title="ویرایش"></a>';

        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="حذف"
                       class="deleteProduct">
                       <img src="' . $delete . '" width="25" title="حذف"></a>';

        return $btn;

    }

    public function action($row)
    {
        $success = url('/public/icon/icons8-edit-144.png');
        $delete = url('/public/icon/icons8-delete-bin-96.png');


        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"
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
