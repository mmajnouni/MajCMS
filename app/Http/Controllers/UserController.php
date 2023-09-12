<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Session;
class UserController extends Controller
{
    public function show(User $user) {
        return view('admin.users.profile', ['user' => $user]);
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
}
