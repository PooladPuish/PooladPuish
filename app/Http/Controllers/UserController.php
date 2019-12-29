<?php


namespace App\Http\Controllers;

use App\Detail;
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
    /**
     * بررسی انلاینی پرسنل *
     */
    public function isOnline()
    {
        return \Cache::has('active' . $this->id);
    }

    /**
     * نمایش فرم ثبت نام کاربر *
     */
    public function wizard()
    {
        $roles = Role::all();
        return view('users.wizard', compact('roles'));
    }

    /**
     *ثبت نام کاربر جدید در سیستم*
     */
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
        $success = $user->roles()->sync($request->input('roles'));
        if ($success) {
            return MsgSuccess('مشخصات کاربر جدید با موفقیت در سیستم ثبت شد');
        }
    }

    /**
     * نمایش پروفایل پرسنل *
     */
    public function profile()
    {
        return view('profile.profile');
    }

    /**
     *ویرایش مشخصات کاربران*
     */
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

    /**
     *ویرایش گلمه عبور کاربران*
     */
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

    /**
     *ویرایش تصویر کاربران*
     */
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

    /**
     *نمایش لیست کاربران*
     */
    public function show(Request $request)
    {
        $checks = \DB::table("detail_user")
            ->where("user_id", auth()->user()->id)
            ->pluck("detail_id", "detail_id")
            ->all();
        foreach ($checks as $check)
            $permissions = Detail::get();
        if (count($checks) > 0) {
            $users = User::orderBy('id', 'DESC')->get();
            return view('users.show', compact('users', 'permissions', 'check', 'checks'));
        } else {
            $users = User::orderBy('id', 'DESC')->get();
            return view('users.list', compact('users'));
        }
    }

    /**
     *نمایش لیست کاربران*
     */
    public function disable(User $id)
    {
        $sStatus = User::where('id', $id->id)->get();
        foreach ($sStatus as $status)
            if ($status->status == null) {
                $ok = User::find($status->id)->update([
                    'status' => 1,
                ]);
                if ($ok) {
                    return MsgSuccess('تمام فعالیت های کاربر با موفقیت غیر فعال شد');
                }
            } else {
                $success = User::find($status->id)->update([
                    'status' => null,
                ]);
                if ($success) {
                    return MsgSuccess('تمام فعالیت های کاربر با موفقیت فعال شد');
                }
            }
    }

    /**
     *نمایش فرم ویرایش کاربران*
     */
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

    /**
     *ویرایش کاربران*
     */
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
        $success = $user->roles()->sync($request->input('roles'));
        if ($success) {
            return MsgSuccess('مشخصات کاربر با موفقیت ویرایش شد');
        }
    }

    /**
     *  قفل صفحه*
     */
    public function lock()
    {
        return view('lock.lock');
    }

    /**
     * ارسال کبمه عبور جدید برای کاربران
     */
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

    /**
     * متوقف کردن نرم افزار*
     */
    public function stop()
    {
        $exit = \DB::table('users')->update([
            'exit' => 1,
        ]);
        if ($exit) {
            $user = User::where('id', auth()->user()->id)->get();
            foreach ($user as $use)
                $success = User::find($use->id)->update([
                    'exit' => null,
                ]);
            if ($success) {
                return MsgSuccess('سیستم اماده بازسازی میباشد');
            }
        } else {
            return MsgError('در حال حاضر امکان توقف سرویس های نرم افزار ممکن نیست');
        }

    }


    /**
     * شروع کار نرم افزار *
     */
    public function start()
    {
        $exit = \DB::table('users')->update([
            'exit' => null,
        ]);
        if ($exit) {
            return MsgSuccess('نرم افزار با موفقیت راه اندازی شد');
        } else {
            return MsgSuccess('تمام سرویس های نرم افزار در حال اجرا هستند نیازی به راه اندازی نیست');
        }
    }
}

