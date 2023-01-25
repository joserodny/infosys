<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.login');
    }
    public function create()
    {
        return view('user.register');
    }
    public function store(Request $request)
    {
        $user = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required'],

        ]);
        // - hash passwored
        $user['password'] = bcrypt($user['password']);

        // - create user
        $user = User::create($user);

        // - login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }
}
