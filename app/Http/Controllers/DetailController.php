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
        $details = Detail::all();
        return view('details.wizard', compact('details', 'id'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'detail' => 'required',
        ]);

        foreach ($request->input('detail') as $detail) {
            $details = \DB::table('detail_user')->insert([
                'user_id' => $request->id,
                'detail_id' => $detail,
            ]);
        }
        if ($details) {
            return MsgSuccess('دسترسی های انتخاب شده از پرسنل سلب خواهد شد');
        }
    }
}
