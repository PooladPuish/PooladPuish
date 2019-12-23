<?php

namespace App\Http\Controllers;

use App\Alternatives;
use App\User;
use Illuminate\Http\Request;
use function App\Providers\MsgError;
use function App\Providers\MsgSuccess;

class AlternativesController extends Controller
{
    public function wizard()
    {
        $users = User::all();
        return view('alternatives.wizard', compact('users'));
    }

    public function store(Request $request)
    {
        if ($request->user_id == $request->alternate_id) {
            return MsgError('انتخاب فرد جایگزین اشتباه است لطفا در انتخاب فرد جایگزین دقت کنید');
        }
        if ($request->from > $request->ToDate or $request->from == $request->ToDate) {
            return MsgError('تاریخ انتخاب شده اشتباه است لطفا در انتخاب تاریخ جایگزینی دقت کنید');
        }

        $success = Alternatives::create($request->all());
        if ($success) {
            return MsgSuccess('جایگزینی با موفقیت ثبت شد و اعلان برای کاربران ارسال خواهد شد');
        }

    }
}
