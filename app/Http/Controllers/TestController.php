<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function showDatatable()
    {
        $tests = Test::orderBy('order', 'ASC')->select('id', 'name', 'label', 'created_at')->get();
        return view('test', compact('tests'));
    }

    public function updateOrder(Request $request)
    {
        $tasks = Test::all();
        foreach ($tasks as $task) {
            $task->timestamps = false; // To disable update_at field updation
            $id = $task->id;
            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $task->update(['order' => $order['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }
}
