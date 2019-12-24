<?php

namespace App\Http\Controllers;

use App\Detail;
use App\User;
use Illuminate\Http\Request;
use function App\Providers\MsgSuccess;

class DetailController extends Controller
{
    public function wizard()
    {
        $details = Detail::all();
        $users = User::all();
        return view('details.wizard', compact('details', 'users'));

    }

    public function store(Request $request)
    {
        $userss = User::where('id', $request['user'])->get();
        foreach ($userss as $users)
            $user = $users->id;
        foreach ($request->input('detail') as $detail) {
            $details = \DB::table('detail_user')->insert([
                'user_id' => $user,
                'detail_id' => $detail,
            ]);
        }
        if ($details) {
            return MsgSuccess('دسترسی های انتخاب شده از پرسنل سلب خواهد شد');
        }
    }
}
