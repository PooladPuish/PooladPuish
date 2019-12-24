<?php

namespace App\Http\Controllers;

use App\Alternatives;
use App\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;
use Morilog\Jalali\Jalalian;
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
        $checks = Alternatives::whereNull('status')->get();
        foreach ($checks as $check)
            if (!empty($check)) {
                if ($request->alternate_id == $check->alternate_id) {
                    return MsgError('پرسنلی که برای جایگزینی انتخاب کرده اید از قبل درسیستم درخواست جایگزینی فعال دارد');
                }
                if ($request->user_id == $check->user_id) {
                    return MsgError('پرسنلی که قصد درخواست جابجایی دارد از قبل در سیتم درخواست جابجایی فعال دارد');
                }
            }
        try {
            \DB::transaction(function () use ($request) {
                $success = Alternatives::create($request->all());
                if ($success) {
                    $role_users = \DB::table('role_user')
                        ->where('user_id', $request->input('user_id'))
                        ->get();
                    foreach ($role_users as $role_user)
                        $duplicate = \DB::table('role_user')
                            ->where([
                                'user_id' => $request->input('alternate_id'),
                                'role_id' => $role_user->role_id,
                            ])->first();
                    if (!$duplicate) {
                        try {
                            $role_check = \DB::table('role_user')->insert([
                                'user_id' => $request->input('alternate_id'),
                                'role_id' => $role_user->role_id,
                                'label' => "1",
                            ]);
                            if ($role_check) {
                                return MsgSuccess('جایگزینی با موفقیت ثبت شد و اعلان برای کاربران ارسال خواهد شد');
                            } else {
                                return MsgError('پرسنل مورد نظر دسترسی های لازم را داراست');
                            }
                        } catch (Exception $exception) {
                        }
                    } else {
                        return MsgError('پرسنل مورد نظر دسترسی های لازم را داراست');
                    }
                }
                return MsgSuccess('جایگزینی با موفقیت ثبت شد و اعلان برای کاربران ارسال خواهد شد');
            });
            return MsgSuccess('جایگزینی با موفقیت ثبت شد و اعلان برای کاربران ارسال خواهد شد');
        } catch (Exception $exception) {
            DB::rollBack();
            return MsgError('پرسنل مورد نظر دسترسی های لازم را داراست');
        }
    }

    public function view(Request $request)
    {
        $alternatives = Alternatives::where('alternate_id', auth()->user()->id)
            ->whereNull('view')->get();
        foreach ($alternatives as $alternative)
            Alternatives::find($alternative->id)->update([
                'view' => 1,
            ]);
        return back();
    }
}
