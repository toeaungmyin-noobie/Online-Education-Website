<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Commands\CreateRole;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        // dd($users->course);
        return view('backend.users-table', compact('users', 'roles'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.user-edit-form', compact('user', 'roles'));
    }
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if (isset($request->password)) {
            $user->password = $request->password;
        }
        $user->syncRoles($request->role)->save();
        return to_route('dashboard.users')->with('update-success', 'User ID-' . $user->id . 'updated Successfully');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $username = $user->name;
        $user->delete();
        return to_route('dashboard.users')->with('delete-success', 'User(' . $username . ') has been deleted');
    }
}
