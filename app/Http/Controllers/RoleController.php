<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use function App\Providers\MsgSuccess;

class RoleController extends Controller
{
    //نمایش فرم ثبت بخش جدید
    public function wizard()
    {
        $permissions = Permission::all();
        return view('roles.wizard', compact('permissions'));

    }

    //ثبت بخش جدید
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $role->permissions()->sync($request->input('permission'));
        return MsgSuccess('بخش جدید با موفقیت در سیستم ثبت شد');
    }
}
