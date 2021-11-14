<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::select('*')->with('role')->paginate(2);
        return view('admin.user-index', compact('users'));

    }

    public function show(User $user)
    {
        $user->load('role', 'orders.orderproducts');
        $roles = Role::all();

        return view('admin.user-show', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {

        $user->update($request->validated());
        return back()->with('status', "Пользователь $user->name успешно обновлен");
    }

}
