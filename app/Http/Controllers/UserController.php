<?php


namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Morilog\Jalali\Jalalian;
use Yajra\DataTables\Facades\DataTables;
use function App\Providers\MsgError;
use function App\Providers\MsgSuccess;


class UserController extends Controller
{
    //نمایش فرم ثبت کاربر جدید
    public function wizard()
    {
        $roles = Role::all();
        return view('users.wizard', compact('roles'));
    }

    // ثبت کاربر جدید در سیستم
    public function store(Request $request)
    {
        if (!empty($request->input('avatar'))) {
            $this->validate($request, [
                'avatar' => 'mimes:jpeg,jpg,png',
                'name' => 'required',
                'phone' => 'required',
                'password' => 'required',
                'email' => 'required|unique:users',
            ], [
                'email.unique' => 'کاربری با این کد ملی در سیستم موجود است.',
                'email.required' => 'پر کردن فیلد کد ملی الزامی میباشد.',
            ]);
        } else
            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required',
                'password' => 'required',
                'email' => 'required|unique:users',

            ], [
                'email.unique' => 'کاربری با این کد ملی در سیستم موجود است.',
                'email.required' => 'پر کردن فیلد کد ملی الزامی میباشد.',

            ]);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $avatar = $request->file('avatar')->move('public/upload/avatar/', $name);
        } else {
            $avatar = null;
        }
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),
            'avatar' => $avatar,
        ]);
        $user->roles()->sync($request->input('roles'));
        return MsgSuccess('مشخصات کاربر جدید با موفقیت در سیستم ثبت شد');
    }

    //نمایش پروفایل کاربر
    public function profile()
    {
        return view('profile.profile');
    }

    //ویرایش مشخصات کاربر
    public function update(Request $request)
    {
        $users = User::where('id', $request->id)->get();
        foreach ($users as $user)
            if ($user->email != $request->input('email')) {
                $this->validate($request, [
                    'email' => 'required|unique:users',
                ], [
                    'email.unique' => 'کاربری با این کد ملی در سیستم موجود است.',
                    'email.required' => 'پر کردن فیلد کد ملی الزامی میباشد.',
                ]);
            }
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        $user = User::find($user->id)->update([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
        ]);
        if ($user) {
            return MsgSuccess('مشخصات شما با موفقیت ویرایش شد');
        } else
            return back();
    }

    //ویرایش کلمه عبور کاربر
    public function reset(Request $request)
    {
        $this->validate($request, [
            'old_pass' => 'required',
            'new_pass' => 'required',
        ]);
        $input = $request->all();
        $users = User::where('id', $request->id)->get();
        foreach ($users as $user)
            if (!Hash::check($input['old_pass'], $user->password)) {
                return MsgError('کلمه عبور قبلی صحیح نمیباشد');
            } else {
                $user = User::find($user->id)->update([
                    'password' => Hash::make($request->input('new_pass')),
                ]);
                if ($user) {
                    return MsgSuccess('کلمه عبور شما با موفقیت ویرایش شد');
                } else
                    return back();
            }
    }

    //ویرایش تصویر کاربر
    public function avatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'mimes:jpeg,jpg,png|required',
        ]);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $avatar = $request->file('avatar')->move('public/upload/avatar/', $name);
        }
        $users = User::where('id', $request->id)->get();
        foreach ($users as $user)
            $user = User::find($user->id)->update([
                'avatar' => $avatar,
            ]);
        if ($user) {
            return MsgSuccess('تصویر پروفایل شما با موفقیت ویرایش شد');
        } else
            return back();
    }

    //نمایش لیست کاربران
    public function show(Request $request)
    {
        $details = \DB::table('detail_user')->where('user_id', auth()->user()->id)->get();
        foreach ($details as $detail)
            $check_details = \App\Detail::where('id', $detail->detail_id)->get();
        foreach ($check_details as $check_detail)
            $users = User::orderBy('id', 'DESC')->get();
        return view('users.show', compact('users', 'check_detail'));
    }

//فعال و غیر فعال کردن کاربر
    public function disable(User $id)
    {
        $sStatus = User::where('id', $id->id)->get();
        foreach ($sStatus as $status)
            if ($status->status == null) {
                User::find($status->id)->update([
                    'status' => 1,
                ]);
                return MsgSuccess('تمام فعالیت های کاربر با موفقیت غیر فعال شد');
            } else {
                User::find($status->id)->update([
                    'status' => null,
                ]);
                return MsgSuccess('تمام فعالیت های کاربر با موفقیت فعال شد');
            }
    }

    //نمایش فرم ویرایش کاربران
    public function edit(User $id)
    {
        $role = \DB::table('role_user')->where('user_id', $id->id)
            ->pluck('role_id')
            ->all();
        if (!empty($role)) {
            foreach ($id->roles as $role)
                $rol = $role->id;
        } else {
            $rol = null;
        }
        $roles = Role::all();
        return view('users.edit', compact('roles', 'id', 'rol'));

    }

    //ویرایش کاربران
    public function updates(Request $request)
    {
        $user = User::find($request->input('id'));
        if ($user->email != $request->input('email')) {
            $this->validate($request, [
                'email' => 'required|unique:users',
            ], [
                'email.unique' => 'کاربری با این کد ملی در سیستم موجود است.',
                'email.required' => 'پر کردن فیلد کد ملی الزامی میباشد.',
            ]);
        }
        if (!empty($request->input('avatar'))) {
            $this->validate($request, [
                'avatar' => 'mimes:jpeg,jpg,png',
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
            ], [
                'email.required' => 'پر کردن فیلد کد ملی الزامی میباشد.',
            ]);
        } else
            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',

            ], [
                'email.required' => 'پر کردن فیلد کد ملی الزامی میباشد.',
            ]);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $avatar = $request->file('avatar')->move('public/upload/avatar/', $name);
        } else {
            $avatar = $user->avatar;
        }
        if (!empty($request->input('password'))) {
            $pass = Hash::make($request->input('password'));
        } else {
            $pass = $user->password;
        }
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => $pass,
            'avatar' => $avatar,
        ]);
        DB::table('role_user')->where('user_id', $request->id)->delete();
        $user->roles()->sync($request->input('roles'));
        return MsgSuccess('مشخصات کاربر با موفقیت ویرایش شد');
    }

    //قفل صفحه
    public function lock()
    {
        return view('lock.lock');
    }

    //ارسال کلمه عبور جدید برای پرسنل
    public function RestPassword(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
        ], [
            'phone.required' => 'لطفا شماره ثبت شده در سیستم را وارد کنید',
        ]);
        $users = User::where('phone', $request->input('phone'))->get();
        foreach ($users as $user)
            if ($user) {
                $password = rand(999999, 000000);
                session()->flash('pass-success', 'کلمه عبور جدید با موفقیت برای شما ارسال شد');
                return back();
            }
        session()->flash('pass-error', 'شماره وارد شده اشتباه است کاربری با این شماره در سیستم موجود نمیباشد');
        return back();
    }
}

