<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Index
    public function index()
    {
        return view('admin.login');
    }

    // Authenticate
    public function authenticate(Request $request)
    {
        $logins = $request->validate([
            'username' => 'required',
            'passwod' => 'required'
        ]);

        if (Auth::attempt($logins)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin')->with('success', 'Welcome back comrade.');
        }

        return back()->with('loginError', 'Failed to login. Please make sure your username and password is correct.');
    }
}
