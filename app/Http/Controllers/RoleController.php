<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;
use UxWeb\SweetAlert\SweetAlert;
use Yajra\DataTables\Facades\DataTables;
use function App\Providers\MsgSuccess;

class RoleController extends Controller
{
    /**
     * نمایش فرم ثبت بخش جدید*
     */
    public function wizard()
    {
        $permissions = Permission::all();
        return view('roles.wizard', compact('permissions'));

    }

    /**
     * در این بخش اطلاعات  از فرم گرفته میشود  و در حدولهای مربوط به سطح دسترسی در دیتا بیس ذخیره میشود*
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $success = $role->permissions()->sync($request->input('permission'));
        if ($success) {
            return MsgSuccess('بخش جدید با موفقیت در سیستم ثبت شد');
        }
    }

    /**
     *نمایش لیست بخش ها*
     */
    public function show(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('roles.show', compact('roles'));

    }

    /**
     *نمایش فرم ویرایش بخش ها*
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $rolePermission = \DB::table("permission_role")
            ->where("permission_role.role_id", $id)
            ->pluck("permission_role.permission_id", "permission_role.permission_id")
            ->all();
        $permissions = Permission::get();
        return view('roles.edit', compact('permissions', 'role', 'rolePermission'));
    }

    /**
     *به روزرسانی بخش ها*
     */
    public function update(Request $request)
    {
        $role = Role::find($request->id);
        $role->name = $request->input('name');
        $role->save();
        $success = $role->permissions()->sync($request->input('permission'));
        if ($success) {
            return MsgSuccess('بخش با موفقیت در سیستم ویرایش شد');
        }
    }

    /**
     *حذف بخش ها*
     */
    public function delete(Role $id)
    {
        $success = $id->delete();
        if ($success) {
            return MsgSuccess('دسترسی با موفقیت از سیستم حذف شد');
        }
    }

    /**
     *نمایش فرم دسترسی ها*
     */
    public function permission()
    {
        $permissions = Permission::all();
        return view('permissions.wizard', compact('permissions'));
    }

    /**
     *ثبت دسترسی های حدید در سیستم*
     */
    public function Pstore(Request $request)
    {

        Permission::create($request->all());
        return MsgSuccess('دسترسی جدید با موفقیت ثبت شد');

    }
}
