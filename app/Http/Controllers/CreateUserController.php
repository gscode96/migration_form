<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    public function showCreateForm()
    {

        return view('administration.users');
    }

    public function createUser(Request $request)
    {
        // Logic for handling user creation would go here
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  bcrypt($request->password),
        ]);

        return redirect()->intended(route('login'))->with('success', 'User created successfully!');
    }
}
