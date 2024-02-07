<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class SignController extends Controller
{
    public function indexLog()
    {
        return view('landing.login', [
            'title' => 'User Login'
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginErr', 'WRONG EMAIL OR PASSWORD');
    }
    public function indexReg()
    {
        return view('landing.register', [
            'title' => 'User Register'
        ]);
    }
    public function storeReg(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required'],
            'email' => ['required', 'unique:users'],
            'password' => ['required']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        $request->session()->flash('successReg', 'REGISTER SUCCESSFUL!');
        return redirect('/');
    }
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
