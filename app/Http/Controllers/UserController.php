<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Session;
class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }
    public function show(User $user) {
        return view('admin.users.profile', ['user' => $user, 'roles' => Role::all()]);
    }

    public function update(User $user) {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email','max:255'],
            'password' => ['required','confirmed', 'min:6', 'max:255'],
            'avatar' => ['file:jpg,jpeg,png,gif']
        ]);

        if (request('avatar')){
        $inputs['avatar'] = request('avatar')->store('images');
        }
        $user->update($inputs);
        return back();
        session()->flash('message', 'Profile Updated successfully!');
//        if (request('avatar')) {
//            dd(request('avatar'));
//        }
    }
    public function destroy(User $user) {
        $user->delete();
        session()->flash('message', 'User Deleted!');
        return back();

    }
    public function attach(User $user){
        $user->Roles()->attach(request('role'));
        return back();
    }
    public function detach(User $user){
        $user->Roles()->detach(request('role'));
        return back();
    }
}
