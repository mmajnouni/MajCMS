<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Str;
use MongoDB\Driver\Session;

class RoleController extends Controller
{
  public function index() {
      return view('admin.roles.index', ['roles' => Role::all()]);
  }

    public function store() {
      request()->validate([
          'name' => 'required'
      ]);
        Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')
        ]);
        return back();
    }

    public function edit(Role $role) {
      return view('admin.roles.edit',
          ['role' => $role, 'permissions' =>Permission::all()]);
    }

    public function update(Role $role) {
        $role->name = Str::ucfirst(request('role'));
        $role->slug = Str::of(request('role'))->slug('-');

        if ($role->isDirty('name')){
        session()->flash('Role-Update', 'Role Update ' . request('name'));
            $role->save();
            return back();
        } else {
            session()->flash('Role-Update', 'You have not change anything.');
             return back();
        }

    }

    public function attach_permission(Role $role) {
      $role->permissions()->attach(request('permission'));
        return back();
    }
    public function detach_permission(Role $role) {
        $role->permissions()->detach(request('permission'));
        return back();
    }
    public function destroy(Role $role){
      $role->delete();
      Session()->flash('message', 'Role ' . $role->name . ' Deleted');
      return back();
    }
}
