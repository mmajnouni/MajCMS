<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PermissionController extends Controller
{
    public function index() {
        return view('admin.permissions.index', [
            'permissions' => Permission::all()
        ]);
    }
    public function store() {
        request()->validate([
            'name' => 'required'
        ]);
        Permission::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')
        ]);
        return back();
    }
    public function update(Permission $permission) {
        $permission->name = Str::ucfirst(request('permission'));
        $permission->slug = Str::of(request('permission'))->slug('-');

        if ($permission->isDirty('name')){
            session()->flash('Permission-Update', 'Permission Updated! ' . request('name'));
            $permission->save();
            return back();
        } else {
            session()->flash('Permission-Update', 'You have not change anything.');
            return back();
        }

    }
    public function edit(Permission $permission) {
        return view('admin.permissions.edit', ['permission' => $permission]);
    }

    public function destroy(Permission $permission) {
        $permission->delete();
        return back();
    }
}
