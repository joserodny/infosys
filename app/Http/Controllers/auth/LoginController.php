<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.login');
    }

    public function destroy(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out!');
    }

    public function authenticate(Request $request, User $user)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerateToken();
            if(auth()->user()->role == '1') {
                return redirect('/admin')->with('message', 'You are now logged in!');
            } else {
                return redirect('/')->with('message', 'You are now logged in as user!');
            }

        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
