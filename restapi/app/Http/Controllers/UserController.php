<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
       return view('register.index', [
        'title' => 'Laravel 11 | Register',
        'active' => 'register'
       ]);
    }

    public function register_store(Request $request)
    {
        $register = $request -> validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|confirmed|min:5',
            // 'confirm_password' => 'required|min:5|max:255'
        ]);

        $register['password'] = Hash::make($register['password']);
        // $register['confirm_password'] = Hash::make($register['confirm_password']);

        User::create($register);
        // $request->session()->flash('success', 'Registration Successfull! Please login');
        return redirect('/login')->with('success', 'Registration Successfull! Please login');
    }

    public function login()
    {
        return view('login.index', [
            'title' => 'Laravel 11 | Login'
        ]);
    }

    public function login_authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)) {

            return redirect()->intended(route('dashboard'));
        }
        return back()->with('LoginError', 'Login details are not valid!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }
}
