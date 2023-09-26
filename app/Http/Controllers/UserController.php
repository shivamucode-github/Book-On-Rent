<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::where('id', '!=', Auth::id())->filter(request(['search']))->orderBy('id', 'desc')->paginate(15)->withQueryString(),
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function store(RegisterRequest $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'role_id' => Role::where('name', 'customer')->first()->id
            ]);

            return back()->with('success', 'User Created Succesfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        try {
            $email = User::where('email', $request->email)->where('email', '!=', $user->email)->first();
            if ($email) {
                return back()->with('error', 'Email address already taken');
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'role_id' => $request->role
            ]);

            return back()->with('success', 'User Updated Succesfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destory(User $user)
    {
        try {
            $user->delete();
            return back()->with('success', 'User Deleted ..');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong ');
        }
    }
}
