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
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        if ($role) {
            return MsgSuccess('نقش جدید با موفقیت در سیستم ثبت شد');
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
            return MsgSuccess('نقش با موفقیت در سیستم ویرایش شد');
        }
    }

    /**
     *حذف بخش ها*
     */
    public function delete(Role $id)
    {
        $success = $id->delete();
        if ($success) {
            return MsgSuccess('نقش با موفقیت از سیستم حذف شد');
        }
    }

    /**
     *نمایش فرم دسترسی ها*
     */
    public function permission(Permission $id)
    {
        $permissions = Permission::all();
        return view('permissions.wizard', compact('permissions', 'id'));
    }

    /**
     *ثبت دسترسی های حدید در سیستم*
     */
    public function Pstore(Request $request)
    {
        $id = $request['id'];
        if (!empty($id)) {
            $update = Permission::find($id)->update([
                'name' => $request['name'],
                'label' => $request['label'],
            ]);
            if ($update) {
                return MsgSuccess('دسترسی با موفقیت ویرایش شد');
            }
        } else {
            $create = Permission::create($request->all());
            if ($create) {
                return MsgSuccess('دسترسی جدید با موفقیت ثبت شد');
            }
        }
    }

    /**
     * حذف دسترسی ها*
     */

    public function Pdelete(Permission $id)
    {
        $success = $id->delete();
        if ($success) {
            return MsgSuccess('دسترسی با موفقیت حذف شد');
        }
    }
}
