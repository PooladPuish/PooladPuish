<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;
use function App\Providers\MsgSuccess;

class ModelController extends Controller
{
    public function list()
    {
        $models = Models::all();
        return view('models.list', compact('models'));

    }

    public function store(Request $request)
    {
        Models::create([
            'code' => $request['code'],
            'name' => $request['name'],
        ]);
        return back();

    }

    public function edit(Request $request)
    {
        $id = $request->id;
        Models::find($id)->update([
            'code' => $request['code'],
            'name' => $request['name'],
        ]);
        return back();
    }

    public function delete(Models $id)
    {
        $id->delete();
        return MsgSuccess('مشخصات قالب ساز با موفقیت از سیستم حذف شد');

    }
}
