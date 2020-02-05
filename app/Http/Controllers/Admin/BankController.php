<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BankController extends Controller
{
    public function list(Request $request)
    {

        if ($request->ajax()) {
            $data = Bank::get();
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
        return view('bank.list');

    }


    public function store(Request $request)
    {
        Bank::updateOrCreate(['id' => $request->id],
            [
                'name' => $request->name,
                'NameBank' => $request->NameBank,
                'CardNumber' => $request->CardNumber,
                'AccountNumber' => $request->AccountNumber,
                'ShabaNumber' => $request->ShabaNumber,
                'status' => $request->status,
            ]);
        return response()->json(['success' => 'Product saved successfully.']);

    }

    public function update($id)
    {
        $bank = Bank::find($id);
        return response()->json($bank);

    }

    public function delete($id)
    {
        $delete = Bank::find($id);
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


}
