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
                'personnel_id' => 'required|unique:users',
                'password' => 'required',
                'email' => 'required|unique:users',
            ], [
                'email.unique' => 'کاربری با این کد ملی در سیستم موجود است.',
                'email.required' => 'پر کردن فیلد کد ملی الزامی میباشد.',
                'personnel_id.unique' => 'کاربری با این شماره پرسنلی در سیستم موجود است.',
            ]);
        } else
            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required',
                'personnel_id' => 'required|unique:users',
                'password' => 'required',
                'email' => 'required|unique:users',

            ], [
                'email.unique' => 'کاربری با این کد ملی در سیستم موجود است.',
                'email.required' => 'پر کردن فیلد کد ملی الزامی میباشد.',
                'personnel_id.unique' => 'کاربری با این شماره پرسنلی در سیستم موجود است.',

            ]);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $avatar = $request->file('avatar')->move("/public/avatar", $name);
        } else {
            $avatar = null;
        }
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'personnel_id' => $request['personnel_id'],
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
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users',
        ], [
            'email.unique' => 'کاربری با این کد ملی در سیستم موجود است.'
        ]);
        $users = User::where('id', $request->id)->get();
        foreach ($users as $user)
            User::find($user->id)->update([
                'name' => $request['name'],
                'phone' => $request['phone'],
                'email' => $request['email'],
            ]);
        return MsgSuccess('مشخصات شما با موفقیت ویرایش شد');
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
                User::find($user->id)->update([
                    'password' => Hash::make($request->input('new_pass')),
                ]);
                return MsgSuccess('کلمه عبور شما با موفقیت ویرایش شد');
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
            $avatar = $request->file('avatar')->move("/public/avatar", $name);
        } else {
            $avatar = null;
        }
        $users = User::where('id', $request->id)->get();
        foreach ($users as $user)
            User::find($user->id)->update([
                'avatar' => $avatar,
            ]);
        return MsgSuccess('تصویر پروفایل شما با موفقیت ویرایش شد');
    }

    //نمایش لیست کاربران
    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = User::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('role', function ($row) {
                    foreach ($row->roles as $name) {
                        if (!empty($name)) {
                            return "<label class=\"btn btn-danger\">{$name->name}</label>";

                        }
                    }
                })
                ->addColumn('email', function ($row) {
                    return $row->email;
                })
                ->addColumn('phone', function ($row) {
                    return $row->phone;
                })
                ->addColumn('personnel_id', function ($row) {
                    return $row->personnel_id;
                })
                ->addColumn('created_at', function ($row) {
                    $created_at = Jalalian::forge($row->created_at)->format('Y/m/d');
                    return $created_at;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == null) {
                        return "<img src='" . url('/public/icon/icons8-checked-user-male-40 (1).png') . "' width='25' title='فعال'>";
                    } else {
                        return "<img src='" . url('/public/icon/icons8-checked-user-male-40.png') . "' width='25' title='غیر فعال'>";
                    }
                })
                ->addColumn('action', function ($row) {
                    return $this->makeActionList($row);
                })
                ->rawColumns(['action', 'role', 'created_at', 'personnel_id'
                    , 'phone', 'email', 'name', 'status'])
                ->make(true);
        }
        return view('users.show');

    }

    //عملیات دیتا تیبل
    public function makeActionList($row)
    {
        if (\Gate::allows('ویرایش کاربران')) {
            $btn = '<a href="' . route('admin.user.edit', $row->id) . '">
                        <img src="' . url('/public/icon/icons8-update-64.png') . '" width="25" title="ویرایش">
                        </a>';
        }
        if (\Gate::allows('فعال و غیر فعال کردن کاربران')) {
            $btn .= '<a href="' . route('admin.user.disable', $row->id) . '">
                        <img src="' . url('/public/icon/disable.png') . '" width="25" title="غیرفعال کردن کاربر">
                        </a>';
        }
        if (!empty($btn)) {
            return $btn;
        }
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

    public function edit(User $id)
    {
        foreach ($id->roles as $role) {
            $rol = $role->id;
        }
        $roles = Role::all();
        return view('users.edit', compact('roles', 'id', 'rol'));

    }

    public function updates(Request $request)
    {
        if (!empty($request->input('avatar'))) {
            $this->validate($request, [
                'avatar' => 'mimes:jpeg,jpg,png',
                'name' => 'required',
                'phone' => 'required',
                'personnel_id' => 'required',
                'email' => 'required',
            ], [
                'email.required' => 'پر کردن فیلد کد ملی الزامی میباشد.',
            ]);
        } else
            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required',
                'personnel_id' => 'required',
                'email' => 'required',

            ], [
                'email.required' => 'پر کردن فیلد کد ملی الزامی میباشد.',
            ]);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $avatar = $request->file('avatar')->move("/public/avatar", $name);
        } else {
            $avatar = null;
        }
        $user = User::find($request->input('id'));
        if (!empty($request->input('password'))) {
            $pass = Hash::make($request->input('password'));
        } else {
            $pass = $user->password;
        }
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'personnel_id' => $request['personnel_id'],
            'password' => $pass,
            'avatar' => $avatar,
        ]);
        DB::table('role_user')->where('user_id', $request->id)->delete();
        $user->roles()->sync($request->input('roles'));
        return MsgSuccess('مشخصات کاربر با موفقیت ویرایش شد');
    }
}

