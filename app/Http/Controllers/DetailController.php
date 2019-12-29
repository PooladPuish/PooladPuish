<?php

namespace App\Http\Controllers;

use App\Detail;
use App\User;
use Illuminate\Http\Request;
use function App\Providers\MsgSuccess;

class DetailController extends Controller
{
    public function wizard(User $id)
    {
        $checks = \DB::table("detail_user")
            ->where("detail_user.user_id", $id->id)
            ->pluck("detail_user.detail_id", "detail_user.detail_id")
            ->all();
        $details = Detail::all();
        if (count($checks) > 0) {
            return view('details.edit', compact('details', 'id', 'checks'));
        } else {
            return view('details.wizard', compact('details', 'id'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'detail' => 'required',
        ]);


        $user = User::find($request->id);
        $user->details()->sync($request->input('detail'));
        return MsgSuccess('دسترسی های جزیی برای پرسنل در سیستم ثبت شد');

    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->details()->sync($request->input('detail'));
        return MsgSuccess('دسترسی های جزیی برای پرسنل در سیستم ثبت شد');

    }
}
