<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
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
            'users' => User::where('id', '!=', Auth::id())->orderBy('id', 'desc')->paginate(15),
        ]);
    }

    public function edit()
    {
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

    public function update()
    {
    }

    public function destory()
    {
    }
}
